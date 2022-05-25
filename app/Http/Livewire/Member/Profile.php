<?php

namespace App\Http\Livewire\Member;

use App\Http\Livewire\Member\Main;

class Profile extends Main
{
  public $username, $name, $phone, $email, $upline, $wallet, $walletType;

  public function mount()
  {
    $data = auth()->user();
    $this->username = $data->username;
    $this->name = $data->name;
    $this->phone = $data->phone;
    $this->email = $data->email;
    $this->upline = $data->upline;
    $this->wallet = $data->wallet;
    $this->walletType = $data->wallet_type;
  }

  public function submit()
  {

  }

  public function render()
  {
    return view('livewire.member.profile')->extends('layouts.default');
  }
}
