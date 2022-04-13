<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use App\Models\Income;
use App\Models\Deposit;
use Livewire\Component;
use App\Models\Withdrawal;
use App\Models\Achievement;
use App\Models\Information;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Component
{
    public $passive, $history, $active, $information, $contract, $entrant, $pin;

    public $errorProfile, $dataProfile, $nameProfile, $emailProfile, $walletProfile, $referralProfile, $successProfile;

    public $qr_image, $google2fa_secret, $pin_google, $new_password, $old_password;

    public function profileMount()
    {
        $this->dataProfile = auth()->user();
        $this->nameProfile = $this->dataProfile->name;
        $this->emailProfile = $this->dataProfile->email;
        $this->walletProfile = $this->dataProfile->wallet;
        $this->referralProfile = URL::to('/registration?ref='.$this->dataProfile->referral);
    }

    public function submitPassword()
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required'
        ]);

        $user = User::findOrFail(auth()->id());

        if (Hash::check($this->old_password, $user->password)) {
            User::findOrFail(auth()->id())->update([
                'password' => Hash::make($this->new_password)
            ]);
            $this->reset(['old_password', 'new_password']);
            session()->flash('message', 'Your password has been changed');
        } else {
            session()->flash('error', 'Invalid old password');
        }
        $this->reset(['old_password', 'new_password']);
        $this->emit('passwordModalClose');
    }

    public function profileSubmit()
    {
        $this->errorProfile = null;
        $this->successProfile = null;

        if (auth()->user()->google2fa_secret) {
            $this->validate([
                'nameProfile' => 'required',
                'emailProfile' => 'required',
                'walletProfile' => 'required',
                'pin' => 'required'
            ]);

            $google2fa = app('pragmarx.google2fa');
            if ($google2fa->verifyKey(auth()->user()->google2fa_secret, $this->pin) === false) {
                $this->error .= "Invalid Google Authenticator PIN";
                return;
            }
        }else{
            $this->validate([
                'nameProfile' => 'required',
                'emailProfile' => 'required',
                'walletProfile' => 'required'
            ]);
        }

        $user = User::findOrFail(auth()->id());
        $user->name = $this->nameProfile;
        $user->email = $this->emailProfile;
        $user->wallet = $this->walletProfile;
        $user->save();
        session()->flash('message', 'Profile updated successfully');
        $this->emit('profileModalClose');
    }

    public function mount()
    {
        $user = auth()->user()->network . auth()->id() . '.';
        $this->entrant = User::select(DB::raw("*, LENGTH(REPLACE(network, '" . $user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $user . "', ''), '.', '')) + 1 level"))->with('contract')->where('network', 'like', $user . '%')->whereRaw("LENGTH(REPLACE(network, '" . $user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $user . "', ''), '.', '')) < 4")->get();

        $this->passive = auth()->user()->benefit_available ? auth()->user()->benefit_available->sum('amount') : 0;
        $this->active = auth()->user()->active_income;
        $this->contract = auth()->user()->contract_remaining ? auth()->user()->contract_remaining->amount : 0;
        $this->history = auth()->user()->withdrawal_all;
    }

    public function render()
    {
        return view('livewire.member.dashboard', [
            'menu' => 'dashboard'
        ])->extends('layouts.default');
    }
}
