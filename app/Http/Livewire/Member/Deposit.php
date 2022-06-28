<?php

namespace App\Http\Livewire\Member;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Deposit extends Component
{
  use WithPagination;

  public $amount = 0, $deposit, $process, $information, $kode;
  protected $paginationTheme = 'bootstrap';

  public function mount()
  {
    $this->deposit = auth()->user()->deposit_waiting_fund->first();
    $this->process = auth()->user()->deposit_waiting_process->first();
  }

  public function cancel($id)
  {
    \App\Models\Deposit::where('id', $id)->whereNull('processed_at')->delete();
    redirect('/deposit');
  }

  public function done()
  {
    $this->validate([
      'information' => 'required',
    ]);

    \App\Models\Deposit::where('id', $this->deposit->id)->whereNull('processed_at')->whereNull('information')->update([
      'information' => $this->information,
    ]);
    session()->flash('success', '<b>Deposit</b><br>Your request is being processed and takes 1 x 24 hours');
    redirect('/deposit');
  }

  public function submit()
  {
    $this->validate([
      'amount' => 'required',
    ]);

    if ($this->deposit) {
      session()->flash('danger', '<b>Deposit</b><br>You must complete the previous order');
      return;
    }

    if ($this->amount <= 0) {
      session()->flash('danger', '<b>Deposit</b><br>Amount must bigger than 0');
      return;
    }

    if ($this->process) {
      session()->flash('danger', '<b>Deposit</b><br>You must complete the previous order');
      return;
    }

    try {
      DB::transaction(function () {
        $dataTicket = Ticket::where('date', date('Y-m-d'))->where('amount', $this->amount)->orderBy('created_at', 'desc')->get();
        if ($dataTicket->count() > 0) {
          $this->kode = $dataTicket->first()->kode + 1;
        } else {
          $this->kode = 1;
        }

        $this->paymentAmount = $this->amount + $this->kode;

        $ticket = new Ticket();
        $ticket->amount = $this->amount;
        $ticket->kode = $this->kode;
        $ticket->date = date('Y-m-d');
        $ticket->save();

        $deposit = new \App\Models\Deposit();
        $deposit->user_id = auth()->id();
        $deposit->wallet = config('constants.wallet');
        $deposit->amount = $this->paymentAmount;
        $deposit->save();
      });

      redirect('/deposit');
    } catch (\Exception $e) {
      session()->flash('danger', '<b>Deposit</b><br>' . $e->getMessage());
      return;
    }
  }

  public function render()
  {
    $this->emit('reinitialize');
    $data = \App\Models\Deposit::where('user_id', auth()->id())->orderBy('id', 'desc');
    return view('livewire.member.deposit', [
      'noUrut' => ($this->page - 1) * 10,
      'data' => $data->paginate(10),
    ])->extends('layouts.default');
  }
}
