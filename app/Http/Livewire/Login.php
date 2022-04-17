<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $error, $username, $password, $referral_token, $remember = false;
    public $message;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public $captcha = 0;

    public function updatedCaptcha($token)
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('RECAPTCHAV3_SECRET') . '&response=' . $token);
        $this->captcha = $response->json()['score'];

        if (!$this->captcha > .3) {
            $this->store();
        } else {
            return session()->flash('error', 'Google thinks you are a bot, please refresh and try again');
        }

    }

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
