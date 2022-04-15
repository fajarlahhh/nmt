<?php

namespace App\Http\Livewire\Member;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Income;
use App\Models\Ticket;
use App\Models\Deposit;
use App\Models\Contract;
use App\Models\Withdrawal;
use App\Models\PassiveIncome;
use App\Http\Livewire\Member\Main;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Dashboard extends Main
{
    public $pin, $user, $today, $time, $dataContract, $contract;

    public $availableActive = 0, $amountActive = 0, $usdtWd = 0, $usdtPrice = 0, $activeData;

    public $passiveData;

    protected $listeners = [
        'set:activeupdate' => 'activeUpdated',
        'set:setpelanggan' => 'setPelanggan'
    ];

    public function restakeMount()
    {
        $this->dataContract = Contract::where('value', '>=', auth()->user()->contract->value)->get();
    }

    public function contractMount()
    {
        $amount = auth()->user()->contract->value;
        $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
        $this->usdtPrice = (float)$indodax[strtolower('usdt_idr')]['last'];
        $this->usdtWd = round(($amount ?: 0) * 14000 / $this->usdtPrice, 3);
    }

    public function restakeSubmit()
    {
        if (!auth()->user()->invalid_at) {
            DB::transaction(function () {
                $dataTicket = Ticket::where('date', date('Y-m-d'))->where('id_contract', $this->contract)->orderBy('created_at', 'desc')->get();
                if ($dataTicket->count() > 0) {
                    $this->ticket = $dataTicket->first()->kode;
                } else {
                    $this->ticket = 1;
                }

                $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
                $payment_idr = (float)$indodax[strtolower('usdt_idr')]['last'];
                $this->payment_amount = (float)round(collect($this->dataContract)->where('id', $this->contract)->first()->value * 15000 / $payment_idr, 3) + ($this->ticket * 1 / 1000);

                $ticket = new Ticket();
                $ticket->id_contract = $this->contract;
                $ticket->kode = $this->ticket;
                $ticket->date = now();
                $ticket->save();

                $deposit = new Deposit();
                $deposit->id_owner = auth()->id();
                $deposit->id_user = auth()->id();
                $deposit->wallet = config('constants.wallet');
                $deposit->amount = $this->payment_amount;
                $deposit->requisite = 'Restake';
                $deposit->save();

                User::where('id', auth()->id())->update([
                    'activated_at' => null
                ]);
            });
            $this->emit('restakeModalClose', true);
            redirect('/activation');
        }
    }

    public function contractSubmit()
    {
        if(auth()->user()->invalid_at < now()){
            $error = null;

            if (!auth()->user()->wallet) {
                $error .= "You haven't entered your wallet address yet<br>";
            }

            if($error){
                session()->flash('error', $error);
                return;
            }

            DB::transaction(function () {
                $withdrawal = new Withdrawal();
                $withdrawal->wallet = auth()->user()->wallet;
                $withdrawal->amount = auth()->user()->contract->value;
                $withdrawal->fee = 0;
                $withdrawal->usdt_price = $this->usdtPrice;
                $withdrawal->usdt_amount = $this->usdtWd;
                $withdrawal->id_user = auth()->id();
                $withdrawal->type = 'contract';
                $withdrawal->save();

                User::where('id', auth()->id())->update([
                    'invalid_at' => null
                ]);

                Income::where('id_user', auth()->id())->delete();
                PassiveIncome::where('id_user', auth()->id())->delete();
                Withdrawal::where('id_user', auth()->id())->whereNotNull('processed_at')->delete();
                session()->flash('message', 'Successfully claim fund');
            });
            $this->emit('contractModalClose', true);
        }
    }

    public function activeMount()
    {
        $this->time = date('Hms');
        $this->amountActive = '';
        $this->usdtWd = '';
        $this->usdtPrice = '';
        $this->activeData = auth()->user()->active_income;
    }

    public function passiveMount()
    {
        $this->passiveData = auth()->user()->passive_income;
    }

    public function passiveSubmit($key)
    {
        $data = PassiveIncome::where('id', $key)->whereNull('id_withdrawal')->where('valid_at', '<=', now())->get();
        if($data->count() > 0){
            $data = $data->first();
            $error = null;

            if (!auth()->user()->wallet) {
                $error .= "You haven't entered your wallet address yet<br>";
            }

            if($error){
                session()->flash('error', $error);
                return;
            }

            $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
            $this->usdtPrice = (float)$indodax[strtolower('usdt_idr')]['last'];
            $this->usdtWd = round((($data->amount ?: 0) - (($data->amount ?: 0) * 0.1)) * 14000 / $this->usdtPrice, 3);

            DB::transaction(function () use ($data, $key) {
                $withdrawal = new Withdrawal();
                $withdrawal->wallet = auth()->user()->wallet;
                $withdrawal->amount = $data->amount;
                $withdrawal->fee = ($data->amount?:0) * 0.1;
                $withdrawal->usdt_price = $this->usdtPrice;
                $withdrawal->usdt_amount = $this->usdtWd;
                $withdrawal->id_user = auth()->id();
                $withdrawal->type = 'passive';
                $withdrawal->save();

                PassiveIncome::where('id', $key)->update([
                    'id_withdrawal' => $withdrawal->id,
                ]);
            });
        }
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
        $this->today = Carbon::now()->addDays(3)->dayOfWeek;

        if ($this->availableActive < $min * auth()->user()->contract->value) {
            $error .= "Your available income is less then $ " . number_format($min * auth()->user()->contract->value, 2) . "<br>";
        }

        if ($this->today > 0 || $this->today < 6) {
            $error .= "You cant claim your active income at weekend<br>";
        }

        if (date('Hms') < '070000' || date('Hms') > '150000') {
            $error .= "You can claim your active income at 07.00 until 13.00 UTC + 2<br>";
        }

        if (!auth()->user()->wallet) {
            $error .= "You haven't entered your wallet address yet<br>";
        }

        if (auth()->user()->withdrawal_active_today) {
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
            $withdrawal->type = 'active';
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
