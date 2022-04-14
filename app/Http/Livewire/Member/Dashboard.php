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
use Illuminate\Support\Facades\Http;

class Dashboard extends Component
{
    public $pin, $user;

    public $errorProfile, $dataProfile, $nameProfile, $emailProfile, $walletProfile, $referralProfile, $successProfile;

    public $qr_image, $googleAuthSecret, $pinGoogle, $newPassword, $oldPassword;

    public $availableActive = 0, $amountActive = 0, $usdtWd = 0, $usdtPrice = 0, $activeData;

    public $passiveData;

    public function profileMount()
    {
        $this->dataProfile = auth()->user();
        $this->nameProfile = $this->dataProfile->name;
        $this->emailProfile = $this->dataProfile->email;
        $this->walletProfile = $this->dataProfile->wallet;
        $this->referralProfile = URL::to('/registration?ref=' . $this->dataProfile->referral);
    }

    protected $listeners = [
        'set:activeupdate' => 'activeUpdated',
        'set:setpelanggan' => 'setPelanggan'
    ];

    public function activeMount()
    {
        $this->amountActive = '';
        $this->usdtWd = '';
        $this->usdtPrice = '';
        $this->activeData = auth()->user()->active_income;
    }

    public function passiveMount()
    {
        $this->passiveData = auth()->user()->passive_income;
    }

    public function activeCount()
    {
        $this->validate([
            'amountActive' => 'required'
        ]);
        $this->amountActive = $this->amountActive ?: 0;
        $error = '';
        $max = 0.5;
        $min = 0.1;

        if ($this->availableActive < $min * auth()->user()->contract->value) {
            $error .= "Your available income is less then $ " . number_format($min * auth()->user()->contract->value, 2) . "<br>";
        }

        if (!auth()->user()->wallet) {
            $error .= "You haven't entered your wallet address yet<br>";
        }

        if (auth()->user()->withdrawal_active_today->count() > 0) {
            $error .= "Withdrawals can only be done once a day<br>";
        }

        if ($this->amountActive < $min * auth()->user()->contract->value) {
            $error .= "Minimum withdrawal amount is $ " . number_format($min * auth()->user()->contract->value, 2) . "<br>";
        }

        if ($this->amountActive > $max * auth()->user()->contract->value) {
            $error .= "Maximum withdrawal amount is $ " . number_format($max * auth()->user()->contract->value, 2) . "<br>";
        }

        if ($error) {
            session()->flash('error', $error);
            $this->emit('activeModalClose', false);
            return;
        }
        $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
        $this->usdtPrice = (float)$indodax[strtolower('usdt_idr')]['last'];
        $this->usdtWd = round((($this->amountActive ?: 0) - (($this->amountActive ?: 0) * 0.1)) * 14000 / $this->usdtPrice, 3);
        $this->emit('activeModalClose', true);
    }

    public function activeSubmit()
    {
        if (auth()->user()->googleAuthSecret) {
            $this->validate([
                'availableActive' => 'required',
                'usdtWd' => 'required',
                'availableActive' => 'required',
                'pin' => 'required'
            ]);

            $google2fa = app('pragmarx.google2fa');
            if ($google2fa->verifyKey(auth()->user()->googleAuthSecret, $this->pin) === false) {
                session()->flash('error', 'Invalid Google Authenticator PIN');
                $this->emit('activeModalClose');
                return;
            }
        } else {
            $this->validate([
                'availableActive' => 'required',
                'usdtWd' => 'required',
                'availableActive' => 'required'
            ]);
        }

        DB::transaction(function () {
            $withdrawal = new Withdrawal();
            $withdrawal->wallet = auth()->user()->wallet;
            $withdrawal->amount = $this->amountActive;
            $withdrawal->fee = ($this->amountActive ?: 0) * 0.1;
            $withdrawal->usdt_price = $this->usdtPrice;
            $withdrawal->usdt_amount = $this->usdtWd;
            $withdrawal->id_user = auth()->id();
            $withdrawal->save();

            $income = new \App\Models\Income();
            $income->description = "Withdrawal $ " . number_format($this->amountActive) . " = " . number_format($this->usdtWd) . " USDT";
            $income->debit = $this->amountActive;
            $income->credit = 0;
            $income->id_user = auth()->id();
            $income->id_withdrawal = $withdrawal->id;
            $income->save();
            session()->flash('message', 'Successfully claim active income');
        });
        $this->emit('activeSubmitClose', true);
    }

    public function passwordSubmit()
    {
        $this->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required'
        ]);

        $user = User::findOrFail(auth()->id());

        if (Hash::check($this->oldPassword, $user->password)) {
            User::findOrFail(auth()->id())->update([
                'password' => Hash::make($this->newPassword)
            ]);
            $this->reset(['oldPassword', 'newPassword']);
            session()->flash('message', 'Your password has been changed');
        } else {
            session()->flash('error', 'Invalid old password');
        }
        $this->reset(['oldPassword', 'newPassword']);
        $this->emit('passwordModalClose');
    }

    public function profileSubmit()
    {
        $this->errorProfile = null;
        $this->successProfile = null;

        if (auth()->user()->googleAuthSecret) {
            $this->validate([
                'nameProfile' => 'required',
                'emailProfile' => 'required',
                'walletProfile' => 'required',
                'pin' => 'required'
            ]);

            $google2fa = app('pragmarx.google2fa');
            if ($google2fa->verifyKey(auth()->user()->googleAuthSecret, $this->pin) === false) {
                session()->flash('error', 'Invalid Google Authenticator PIN');
                return;
            }
        } else {
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
        $this->user = auth()->user()->network . auth()->id() . '.';
    }

    public function render()
    {
        $this->availableActive = auth()->user()->active_income ? auth()->user()->active_income->sum('credit') - auth()->user()->active_income->sum('debit') : 0;
        return view('livewire.member.dashboard', [
            'entrant' => User::select(DB::raw("*, LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', '')) + 1 level"))->with('contract')->where('network', 'like', $this->user . '%')->whereRaw("LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', '')) < 4")->get(),
            'passive' => auth()->user()->benefit_available ? auth()->user()->benefit_available->sum('amount') : 0,
            'active' => auth()->user()->active_income,
            'contract' => auth()->user()->contract_remaining ? auth()->user()->contract_remaining->amountActive : 0,
            'history' => auth()->user()->withdrawal_all,
            'menu' => 'dashboard'
        ])->extends('layouts.default');
    }
}
