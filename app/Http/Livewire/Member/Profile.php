<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Profile extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $data, $username, $name, $phone, $email, $upline, $wallet;

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
    $this->validate(
      [
        'username' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'wallet' => 'required',
      ]
    );
    $this->data->name = $this->name;
    $this->data->phone = $this->phone;
    $this->data->email = $this->email;
    $this->data->wallet = $this->wallet;
    $this->data->save();
    session()->flash('success', '<b>Profile Update</b><br>Your profile updated successfully');
  }

  public function render()
  {
    $data = User::select(DB::raw("*, LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', '')) + 1 level"))->with('contract')->where('network', 'like', $this->user . '%')->whereRaw("LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', '')) < 5");
    return view('livewire.member.profile', [
      'noUrut' => ($this->page - 1) * 10,
      'data' => $data->paginate(10),
    ])->extends('layouts.default');
  }
}
