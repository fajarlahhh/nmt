<?php

namespace App\Http\Livewire\Administrator;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Pin extends Component
{
  use WithPagination;

  public $amount, $user, $dataUser;
  protected $paginationTheme = 'bootstrap';

  public function mount()
  {
    $this->dataUser = User::where('role', 1)->whereNotNull('activated_at')->get();
  }

  protected $listeners = [
    'set:setuser' => 'setUser',
  ];

  public function setUser($user)
  {
    $this->user = $user;
  }

  public function send()
  {
    $this->validate([
      'amount' => 'required',
      'user' => 'required',
    ]);

    $pin = new \App\Models\Pin();
    $pin->description = "Top up ";
    $pin->topup = 1;
    $pin->debit = 0;
    $pin->credit = $this->amount;
    $pin->user_id = $this->user;
    $pin->operator_id = auth()->id();
    $pin->save();
    redirect('/admin-area/pin');
  }

  public function render()
  {
    $this->emit('reinitialize');
    $data = \App\Models\Pin::where('topup', 1)->orderBy('created_at', 'desc')->paginate(10);
    return view('livewire.administrator.pin', [
      'data' => $data,
      'no' => ($this->page - 1) * 10,
    ])->extends('layouts.admin', [
      'menu' => 'pin',
    ]);
  }
}
