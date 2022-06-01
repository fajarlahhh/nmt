<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
  public $data, $username, $name, $phone, $email, $upline, $wallet, $security;

  public function mount()
  {
    $this->data = User::findOrFail(auth()->id());
    $this->username = $this->data->username;
    $this->name = $this->data->name;
    $this->phone = $this->data->phone;
    $this->email = $this->data->email;
    $this->upline = $this->data->upline;
    $this->wallet = $this->data->wallet;
  }

  public function submit()
  {
    if (!auth()->user()->activated_at) {
      session()->flash('danger', '<b>Profile</b><br>You cannot do this action');
      return;
    }
    if (auth()->user()->security) {$this->validate(
      [
        'username' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'wallet' => 'required',
        'security' => 'required',
      ]
    );
    } else {
      $this->validate(
        [
          'username' => 'required',
          'name' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'wallet' => 'required',
        ]
      );
    }

    if (auth()->user()->security != $this->security) {
      session()->flash('danger', '<b>Profile</b><br>Invalid security pin');
      return;
    }

    $this->data->name = $this->name;
    $this->data->phone = $this->phone;
    $this->data->email = $this->email;
    $this->data->wallet = $this->wallet;
    $this->data->save();
    session()->flash('success', '<b>Profile</b><br>Your profile updated successfully');
  }

  public function render()
  {
    return view('livewire.member.profile')->extends('layouts.default');
  }
}
