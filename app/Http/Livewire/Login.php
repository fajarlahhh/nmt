<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Login extends Component
{

  public $error, $username, $password, $referral_token, $remember = false;
  public $message;

  protected $rules = [
    'username' => 'required',
    'password' => 'required',
  ];

  public function login()
  {
    $this->validate();

    $remember = $this->remember == 'on';
    if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $remember)) {

      Auth::logoutOtherDevices($this->password, 'password');
      if (auth()->user()->role == 1) {
        return redirect('/dashboard');
      } else {
        return redirect('/admin-area');
      }
    }
    session()->flash('error', 'Wrong username or password!!!');
    return;
  }

  public function updated()
  {
    $this->reset('error');
  }

  public function render()
  {
    Auth::logout();
    return view('livewire.login');
  }
}
