<?php

namespace App\Http\Livewire\Administrator;

use App\Http\Livewire\Main;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class Member extends Main
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public $delete, $resetPin, $resetPassword, $status = 1, $error, $key;

  protected $queryString = ['status'];

  public function setDelete($key)
  {
    $this->delete = $key;
    $this->key = $key;
  }

  public function setResetPin($key)
  {
    $this->resetPin = $key;
    $this->key = $key;
  }

  public function setResetPassword($key)
  {
    $this->resetPassword = $key;
    $this->key = $key;
  }

  public function updated()
  {
    $this->resetPage();
  }

  public function delete()
  {
    $this->error = null;
    User::findOrFail($this->delete)->delete();
    $this->delete = null;
    $this->key = null;
  }

  public function cancel()
  {
    $this->resetPin = null;
    $this->resetPassword = null;
    $this->delete = null;
    $this->key = null;
  }

  public function resetPin()
  {
    $this->error = null;
    User::where('id', $this->resetPin)->update([
      'security' => null,
    ]);
    $this->resetPin = null;
    $this->key = null;
  }

  public function resetPassword()
  {
    $this->error = null;
    $data = User::findOrFail($this->resetPassword)->first_password;
    User::findOrFail($this->resetPassword)->update([
      'password' => Hash::make($data),
    ]);
    $this->resetPassword = null;
    $this->key = null;
  }

  public function render()
  {
    $data = User::select('*')->orderBy('username')->where('role', 1);
    switch ($this->status) {
      case '1':
        $data = $data->whereNotNull('activated_at');
        break;
      case '2':
        $data = $data->whereNull('activated_at');
        break;
      case '3':
        $data = $data->onlyTrashed();
        break;
    }
    $data = $data->paginate(10);
    return view('livewire.administrator.member', [
      'data' => $data,
      'no' => ($this->page - 1) * 10,
    ])->extends('layouts.admin', [
      'menu' => 'member',
    ]);
  }
}
