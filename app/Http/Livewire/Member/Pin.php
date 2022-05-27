<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pin extends Component
{
  public $username, $amount;

  public function submit()
  {
    $this->validate([
      'username' => 'required',
      'amount' => 'required',
    ]);

    if ($this->amount < 0) {
      session()->flash('danger', '<b>Send Pin</b><br>Invalid amount');
      return;
    }

    if ((int) auth()->user()->available_pin <= $this->amount) {
      session()->flash('danger', '<b>Send Pin</b><br>Insufficient pin');
      return;
    }

    $username = User::where('username', $this->username)->first();

    if (!isset($username)) {
      session()->flash('danger', '<b>Send Pin</b><br>Username is not registered');
      return;
    }

    DB::transaction(function () use ($username) {
      $credit = new \App\Models\Pin();
      $credit->user_id = $username->id;
      $credit->debit = 0;
      $credit->credit = $this->amount;
      $credit->description = "Transferred from " . auth()->user()->username;
      $credit->save();

      $debet = new \App\Models\Pin();
      $debet->user_id = auth()->id();
      $debet->debit = $this->amount;
      $debet->credit = 0;
      $debet->description = "Transfer to " . $this->username;
      $debet->save();
    });
    redirect('/pin');
  }

  public function render()
  {
    $this->emit('reinitialize');
    return view('livewire.member.pin')->extends('layouts.default');
  }
}
