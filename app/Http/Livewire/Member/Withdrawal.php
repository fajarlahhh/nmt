<?php

namespace App\Http\Livewire\Member;

use App\Models\Bonus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Withdrawal extends Component
{
  public $amount, $available, $today, $usdtPrice, $usdtWd;

  public function mount()
  {
    $this->today = Carbon::now()->dayOfWeek;
    $this->available = auth()->user()->available_bonus;
  }

  public function submit()
  {
    if (auth()->user()->googleAuthSecret) {
      $this->validate([
        'available' => 'required',
        'amount' => 'required',
        'pin' => 'required',
      ]);

      $google2fa = app('pragmarx.google2fa');
      if ($google2fa->verifyKey(auth()->user()->googleAuthSecret, $this->pin) === false) {
        session()->flash('danger', '<b>Withdrawal</b><br>Invalid Google Authenticator PIN');
        return;
      }
    } else {
      $this->validate([
        'available' => 'required',
        'amount' => 'required',
      ]);
    }
    $this->amount = $this->amount ?: 0;

    if ($this->available < $this->amount) {
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

    $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
    $this->usdtPrice = (float) $indodax[strtolower('usdt_idr')]['last'];
    $this->usdtWd = round((($this->amount ?: 0) - auth()->user()->contract->fee_withdrawal) * 15000 / $this->usdtPrice, 3);
    $this->emit('confirmation');
  }

  public function confirmation()
  {
    DB::transaction(function () {
      $withdrawal = new \App\Models\Withdrawal();
      $withdrawal->wallet = auth()->user()->wallet;
      $withdrawal->amount = $this->amount;
      $withdrawal->fee = ($this->amount ?: 0) * 0.1;
      $withdrawal->usdt_price = $this->usdtPrice;
      $withdrawal->usdt_amount = $this->usdtWd;
      $withdrawal->user_id = auth()->id();
      $withdrawal->save();

      $bonus = new Bonus();
      $bonus->description = "Withdrawal $ " . number_format($this->amount) . " = " . number_format($this->usdtWd) . " USDT";
      $bonus->debit = $this->amount;
      $bonus->credit = 0;
      $bonus->user_id = auth()->id();
      $bonus->withdrawal_id = $withdrawal->id;
      $bonus->save();

      session()->flash('success', '<b>Withdrawal</b><br>Your withdrawal is successufully created. Please wait for 1 x 24');

      redirect('/withdrawal');
    });
  }

  public function render()
  {
    return view('livewire.member.withdrawal')->extends('layouts.default');
  }
}