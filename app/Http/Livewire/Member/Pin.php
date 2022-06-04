<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Pin extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';
  public $username, $amount, $security;

  public function submit()
  {
    if (!auth()->user()->activated_at) {
      session()->flash('danger', '<b>Pin</b><br>You cannot do this action');
      return;
    }
    if (auth()->user()->security) {
      $this->validate([
        'username' => 'required',
        'amount' => 'required',
        'security' => 'required',
      ]);
    } else {
      $this->validate([
        'username' => 'required',
        'amount' => 'required',
      ]);
    }

    if (auth()->user()->security != $this->security) {
      session()->flash('danger', '<b>Pin</b><br>Invalid security pin');
      return;
    }

    if ($this->amount < 0) {
      session()->flash('danger', '<b>Pin</b><br>Invalid amount');
      return;
    }

    if (1 * auth()->user()->available_pin < $this->amount) {
      session()->flash('danger', '<b>Pin</b><br>Insufficient pin');
      return;
    }

    $username = User::where('username', $this->username)->first();

    if (!isset($username)) {
      session()->flash('danger', '<b>Pin</b><br>Username is not registered');
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
      session()->flash('success', '<b>Pin</b><br>Pin transfer successfully');
    });
    redirect('/pin');
  }

  public function render()
  {
    $this->emit('reinitialize');
    $data = \App\Models\Pin::where('user_id', auth()->id());
    return view('livewire.member.pin', [
      'noUrut' => ($this->page - 1) * 10,
      'data' => $data->paginate(10),
    ])->extends('layouts.default');
  }
}
