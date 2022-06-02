<?php

namespace App\Http\Livewire\Member;

use App\Models\Contract;
use App\Models\Deposit;
use App\Models\Pin;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Renewal extends Component
{
  public $username, $name, $phone, $email, $password, $contract, $upline, $dataContract, $dataUpline, $paymentAmount, $deposit, $information, $security;

  protected $listeners = ['set:setupline' => 'setUpline'];

  public function setUpline($upline)
  {
    $this->upline = $upline;
  }

  public function done()
  {
    $this->validate([
      'information' => 'required',
    ]);

    DB::transaction(function () {
      Deposit::where('id', $this->deposit->id)->where('requisite', 'Enrollment')->whereNull('processed_at')->whereNull('information')->update([
        'information' => $this->information,
      ]);

      User::where('id', $this->deposit->user_id)->restore();
    });
    session()->flash('success', '<b>Contract renewal</b><br>Contract renewal is successful');
    redirect('/renewal');
  }

  public function cancel($id)
  {
    Deposit::where('id', $this->deposit->id)->delete();
    Pin::where('user_id', auth()->id())->orderBy('id', 'desc')->limit(1)->delete();
    redirect('/renewal');
  }

  public function mount()
  {
    $this->dataContract = Contract::all();
    $this->deposit = auth()->user()->waiting_renewal->first();
  }

  public function submit()
  {
    if (auth()->user()->security) {
      $this->validate([
        'contract' => 'required',
        'security' => 'required',
      ]);
    } else {
      $this->validate([
        'contract' => 'required',
      ]);
    }

    if (auth()->user()->security != $this->security) {
      session()->flash('danger', '<b>Contract renewal</b><br>Invalid security pin');
      return;
    }

    if (auth()->user()->waiting_renewal->count() > 0) {
      session()->flash('danger', '<b>Contract renewal</b><br>You must complete the previous enrollment');
      return;
    }

    $dataContract = collect($this->dataContract)->where('id', $this->contract)->first();
    if ((int) auth()->user()->available_pin < (int) $dataContract->pin_requirement) {
      session()->flash('danger', '<b>Contract renewal</b><br>Insufficient pin');
      return;
    }

    try {
      $dataTicket = Ticket::where('date', date('Y-m-d'))->where('contract_id', $this->contract)->orderBy('created_at', 'desc')->get();
      if ($dataTicket->count() > 0) {
        $this->ticket = $dataTicket->first()->kode;
      } else {
        $this->ticket = 1;
      }

      $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
      $paymentIdr = (float) $indodax[strtolower('usdt_idr')]['last'];
      $this->paymentAmount = (float) round($dataContract->value * 15000 / $paymentIdr, 3) + ($this->ticket * 1 / 1000);

      DB::transaction(function () use ($dataContract) {
        $upline = User::where('id', $this->upline)->first();

        User::where('id', auth()->id())->update([
          'contract_id' => $this->contract,
          'activated_at' => now(),
          'reinvest' => auth()->user()->reinvest + 1,
        ]);

        $ticket = new Ticket();
        $ticket->contract_id = $this->contract;
        $ticket->kode = $this->ticket;
        $ticket->date = now();
        $ticket->save();

        $deposit = new Deposit();
        $deposit->owner_id = auth()->id();
        $deposit->user_id = auth()->id();
        $deposit->wallet = config('constants.wallet');
        $deposit->amount = $this->paymentAmount;
        $deposit->requisite = 'Renewal';
        $deposit->save();

        $debet = new Pin();
        $debet->user_id = auth()->id();
        $debet->debit = $dataContract->pin_requirement;
        $debet->credit = 0;
        $debet->description = "Contract renewal " . number_format($dataContract->value);
        $debet->save();

      });

      redirect('/renewal');
    } catch (\Exception $e) {
      session()->flash('danger', '<b>Contract renewal</b><br>' . $e->getMessage());
      return;
    }
  }
  public function render()
  {
    return view('livewire.member.renewal')->extends('layouts.default');
  }
}
