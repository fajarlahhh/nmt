<?php

namespace App\Http\Livewire\Administrator;

use App\Http\Livewire\Member\Main;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;

class Dashboard extends Main
{
  public $deposit, $withdrawal, $user;

  public function mount()
  {
    $this->deposit = Deposit::all();
    $this->withdrawal = Withdrawal::all();
    $this->user = User::whereNotNull('activated_at')->count();
  }

  public function render()
  {
    return view('livewire.administrator.dashboard')->extends('layouts.admin');
  }
}
