<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class Profile extends Component
{
    public $success, $error, $data, $username, $referral, $email, $contract, $parent, $wallet, $upline, $name, $left_turnover, $right_turnover, $pin;

    public function mount()
    {
        $this->data = auth()->user();
        $this->name = $this->data->name;
        $this->email = $this->data->email;
        $this->username = $this->data->username;
        $this->contract = $this->data->contract->value;
        $this->wallet = $this->data->wallet;
        $this->upline = $this->data->upline? $this->data->upline->username: '';
        $this->referral = URL::to('/registration?ref='.$this->data->referral);
    }

    public function submit()
    {
        $this->error = null;
        $this->success = null;

        if (auth()->user()->google2fa_secret) {
            $this->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'contract' => 'required',
                'wallet' => 'required',
                'pin' => 'required'
            ]);

            $google2fa = app('pragmarx.google2fa');
            if ($google2fa->verifyKey(auth()->user()->google2fa_secret, $this->pin) === false) {
                $this->error .= "Invalid Google Authenticator PIN";
                return;
            }
        }else{
            $this->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'contract' => 'required',
                'wallet' => 'required'
            ]);
        }

        $user = User::findOrFail(auth()->id());
        $user->name = $this->name;
        $user->email = $this->email;
        $user->wallet = $this->wallet;
        $user->save();

        redirect('/profile');
    }

    public function render()
    {
        return view('livewire.member.profile')->extends('layouts.default', [
            'menu' => 'profile'
        ]);
    }
}
