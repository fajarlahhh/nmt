<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class Withdrawal extends Component
{
  public $amount, $available;

  public function mount()
  {
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
        session()->flash('error', 'Invalid Google Authenticator PIN');
        $this->emit('activeModalClose');
        return;
      }
    } else {
      $this->validate([
        'available' => 'required',
        'amount' => 'required',
      ]);
    }
    $this->amount = $this->amount ?: 0;
    $error = '';
    $max = 0.5;
    $min = 0.1;
  }

  public function render()
  {
    return view('livewire.member.withdrawal')->extends('layouts.default');
  }
}
