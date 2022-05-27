<?php

namespace App\Http\Livewire\Member\Downline;

use App\Models\Contract;
use App\Models\User;
use Livewire\Component;

class Form extends Component
{
  public $username, $name, $phone, $email, $password, $contract, $upline, $dataContract, $dataUpline;

  protected $listeners = ['set:setupline' => 'setUpline'];

  public function setUpline($upline)
  {
    $this->upline = $upline;
  }

  public function mount()
  {
    $this->dataContract = Contract::all();
    $this->dataUpline = auth()->user()->downline->sortBy('name');
  }

  public function submit()
  {
    if (auth()->user()->waiting_enrollment > 0) {
      session()->flash('danger', '<b>Enrollment</b><br>You must complete the previous enrollment');
      return;
    }
    if (User::where('username', $this->username)->withTrashed()->count() > 0) {
      session()->flash('danger', '<b>Enrollment</b><br>You must complete the previous enrollment');
      return;
    }
    $this->validate([
      'username' => 'required',
      'name' => 'required',
      'phone' => 'required',
      'email' => 'required',
      'password' => 'required',
      'contract' => 'required',
      'upline' => 'required',
    ]);
  }

  public function render()
  {
    $this->emit('reinitialize');
    return view('livewire.member.downline.form')->extends('layouts.default');
  }
}
