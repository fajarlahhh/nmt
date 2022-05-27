<?php

namespace App\Http\Livewire\Member\Downline;

use App\Models\Contract;
use App\Models\Deposit;
use App\Models\Pin;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Form extends Component
{
  public $username, $name, $phone, $email, $password, $contract, $upline, $dataContract, $dataUpline, $paymentAmount, $deposit, $information;

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
      Deposit::where('id', $this->deposit->first()->id)->where('requisite', 'Enrollment')->whereNull('processed_at')->whereNull('information')->update([
        'information' => $this->information,
      ]);

      User::where('id', $this->deposit->first()->id_user)->restore();
    });
    redirect('/downline/new');
  }

  public function cancel($id)
  {
    User::where('id', $id)->whereNull('activated_at')->forceDelete();
  }

  public function mount()
  {
    $this->dataContract = Contract::all();
    $this->dataUpline = auth()->user()->downline->sortBy('name');
    $this->deposit = auth()->user()->waiting_fund->first();
    $this->upline = auth()->id();
  }

  public function submit()
  {
    $this->validate([
      'username' => 'required',
      'name' => 'required',
      'phone' => 'required',
      'email' => 'required',
      'password' => 'required',
      'contract' => 'required',
      'upline' => 'required',
    ]);

    if (auth()->user()->waiting_enrollment->count() > 0) {
      session()->flash('danger', '<b>Enrollment</b><br>You must complete the previous enrollment');
      return;
    }

    if (auth()->user()->waiting_fund->count() > 0) {
      session()->flash('danger', '<b>Enrollment</b><br>You must complete the previous enrollment');
      return;
    }

    if (User::where('username', $this->username)->withTrashed()->count() > 0) {
      session()->flash('danger', '<b>Enrollment</b><br>You must complete the previous enrollment');
      return;
    }

    $dataContract = collect($this->dataContract)->where('id', $this->contract)->first();
    if ((int) auth()->user()->available_pin <= (int) $dataContract->pin_requirement) {
      session()->flash('danger', '<b>Enrollment</b><br>Insufficient pin');
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

        $user = new User();
        $user->phone = $this->phone;
        $user->username = $this->username;
        $user->password = Hash::make($this->password);
        $user->first_password = $this->password;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->contract_id = $this->contract;
        $user->upline_id = $this->upline;
        $user->network = trim($upline->network) . $upline->id . '.';
        $user->deleted_at = now();
        $user->save();

        $ticket = new Ticket();
        $ticket->contract_id = $this->contract;
        $ticket->kode = $this->ticket;
        $ticket->date = now();
        $ticket->save();

        $deposit = new Deposit();
        $deposit->owner_id = auth()->id();
        $deposit->user_id = $user->id;
        $deposit->wallet = config('constants.wallet');
        $deposit->amount = $this->paymentAmount;
        $deposit->requisite = 'Enrollment';
        $deposit->save();

        $debet = new Pin();
        $debet->user_id = auth()->id();
        $debet->debit = $dataContract->pin_requirement;
        $debet->credit = 0;
        $debet->description = "Enrollment contract " . $dataContract->value . " username " . $this->username;
        $debet->save();
      });

      redirect('/downline/new');
    } catch (\Exception $e) {
      session()->flash('danger', '<b>Enrollment</b><br>' . $e->getMessage());
      return;
    }
  }

  public function render()
  {
    $this->emit('reinitialize');
    return view('livewire.member.downline.form')->extends('layouts.default');
  }
}
