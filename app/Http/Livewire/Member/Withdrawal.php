<?php

namespace App\Http\Livewire\Member;

use App\Models\Bonus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Withdrawal extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $amount, $today, $security;

  public function mount()
  {
    $this->today = Carbon::now()->dayOfWeek;
  }

  public function submit()
  {
    if (!auth()->user()->activated_at) {
      session()->flash('danger', '<b>Withdrawal</b><br>You cannot do this action');
      return;
    }
    if (auth()->user()->security) {
      $this->validate([
        'amount' => 'required',
        'security' => 'required',
      ]);
    } else {
      $this->validate([
        'amount' => 'required',
      ]);
    }

    if (auth()->user()->security != $this->security) {
      session()->flash('danger', '<b>Withdrawal</b><br>Invalid security pin');
      return;
    }

    $this->amount = $this->amount ?: 0;

    if (auth()->user()->available_bonus < $this->amount) {
      session()->flash('danger', '<b>Withdrawal</b><br>Insufficient bonus');
      return;
    }

    if ($this->today < 1 || $this->today > 5) {
      session()->flash('danger', '<b>Withdrawal</b><br>You cant claim your active bonus at weekend');
      return;
    }

    if (date('Hms') < 70000 || date('Hms') > 150000) {
      session()->flash('danger', '<b>Withdrawal</b><br>You can claim your active bonus at 07.00 until 13.00 UTC + 2');
      return;
    }

    if (!auth()->user()->wallet) {
      session()->flash('danger', '<b>Withdrawal</b><br>You havent entered your wallet address yet');
      return;
    }

    if (auth()->user()->withdrawal_today->count() > 0) {
      session()->flash('danger', '<b>Withdrawal</b><br>Withdrawals can only be done once a day');
      return;
    }

    if ($this->amount < auth()->user()->contract->minimum_withdrawal) {
      session()->flash('danger', '<b>Withdrawal</b><br>Minimum withdrawal amount is $ ' . number_format(auth()->user()->contract->minimum_withdrawal));
      return;
    }

    if ($this->amount > auth()->user()->contract->maximum_withdrawal) {
      session()->flash('danger', '<b>Withdrawal</b><br>Maximum withdrawal amount is $ ' . number_format(auth()->user()->contract->maximum_withdrawal));
      return;
    }

    $this->emit('confirmation');
  }

  public function confirmation()
  {
    DB::transaction(function () {
      $withdrawal = new \App\Models\Withdrawal();
      $withdrawal->wallet = auth()->user()->wallet;
      $withdrawal->amount = $this->amount - 2;
      $withdrawal->fee = 2;
      $withdrawal->user_id = auth()->id();
      $withdrawal->save();

      $bonus = new Bonus();
      $bonus->description = "Withdrawal";
      $bonus->debit = $this->amount;
      $bonus->credit = 0;
      $bonus->user_id = auth()->id();
      $bonus->withdrawal_id = $withdrawal->id;
      $bonus->save();

      if (auth()->user()->available_contract < 25) {
        User::where('id', auth()->id())->update([
          'activated_at' => null,
        ]);
      }

      session()->flash('success', '<b>Withdrawal</b><br>Your withdrawal is successufully created. Please wait for 1 x 24');

      redirect('/withdrawal');
    });
  }

  public function render()
  {
    $this->emit('reinitialize');
    return view('livewire.member.withdrawal')->extends('layouts.default');
  }
}
