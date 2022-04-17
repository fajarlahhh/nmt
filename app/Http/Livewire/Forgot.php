<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Recovery;
use Illuminate\Support\Str;
use App\Jobs\SendRecoveryMail;
use Illuminate\Support\Facades\Auth;

class Forgot extends Component
{
    public $username, $success;

    protected $rules = [
        'username' => 'required'
    ];

    public function submit()
    {
        $this->validate();
        $error = '';
        $member = null;
        $user = User::where('username', $this->username)->get();
        if ($user->count() > 0) {
            $member = $user->first();
            Recovery::where('email', $member->email)->delete();
            $recovery = new Recovery();
            $recovery->email = $member->email;
            $recovery->token = Str::random(40).date("Ymdhms");
            $recovery->save();
            $details =[
                'token' => $recovery->token,
                'name' => $member->username,
                'email' => $member->email
            ];
            dispatch(new SendRecoveryMail($details));
            session()->flash('message', "The recovery link has been sent to ".$member->email);
        }else{
            session()->flash('error', 'Username not found');
        }
    }

    public function render()
    {
        Auth::logout();
        return view('livewire.forgot')->extends('layouts.auth');
    }
}
