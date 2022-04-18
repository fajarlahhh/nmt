<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Recovery extends Component
{
    public $data, $token, $password;

    protected $queryString = ['token'];

    protected $rules = [
        'password' => 'required'
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

    public function mount()
    {
        $this->data = \App\Models\Recovery::where('token', $this->token)->with('user')->first();
    }

    public function submit()
    {
        $this->validate();
        $error = '';
        if (\App\Models\Recovery::where('token', $this->token)->count() === 0) {
            $error .= "<p>Invalid link</p>";
            return;
        }

        if ($error) {
            session()->flash('error', $error);
        }

        DB::transaction(function () {
            $member = User::findOrFail($this->data->id_user);
            $member->password = Hash::make($this->password);
            $member->save();

            \App\Models\Recovery::where('token', $this->token)->delete();
        });

        if (Auth::attempt(['username' => $this->data->user->username, 'password' => $this->password])) {
            Auth::logoutOtherDevices($this->password, 'password');
            return redirect('/dashboard');
        }
    }

    public function render()
    {
        Auth::logout();
        return view('livewire.recovery')->extends('layouts.auth');
    }
}
