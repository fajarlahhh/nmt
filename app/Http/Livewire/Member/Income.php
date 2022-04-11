<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Withdrawal;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Income extends Component
{
    use WithPagination;

    public $available = 0, $amount = 0, $usdt = 0, $error, $pin, $usdt_price = 0;

    public function updated()
    {
        try {
            if ($this->amount > 0) {
                $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
                $this->usdt_price = (float)$indodax[strtolower('usdt_idr')]['last'];
                $this->usdt = round((($this->amount?:0) - (($this->amount?:0) * 0.1)) * 14000 / $this->usdt_price,3);
            }
        } catch (\Throwable $th) {
            return;
        }
    }

    public function submit()
    {
        $this->error = null;
        $max = 0.5;
        $min = 0.1;

        if (auth()->user()->google2fa_secret) {
            $this->validate([
                'available' => 'required',
                'usdt' => 'required',
                'amount' => 'required',
                'pin' => 'required'
            ]);

            $google2fa = app('pragmarx.google2fa');
            if ($google2fa->verifyKey(auth()->user()->google2fa_secret, $this->pin) === false) {
                $this->error .= "Invalid Google Authenticator PIN";
                return;
            }
        }else{
            $this->validate([
                'available' => 'required',
                'usdt' => 'required',
                'amount' => 'required'
            ]);
        }

        if ($this->available < $min * auth()->user()->contract->value) {
            $this->error .= "Your available income is less then $ ".number_format($min * auth()->user()->contract->value, 2)."<br>";
        }

        if (!auth()->user()->wallet) {
            $this->error .= "You haven't entered your wallet address yet<br>";
        }

        if (Withdrawal::where('id_user', auth()->id())->whereRaw('SUBSTRING(created_at, 1, 10) = "'.date('Y-m-d').'"')->get()->count() > 0) {
            $this->error .= "Withdrawals can only be done once a day<br>";
        }

        if ($this->amount < $min * auth()->user()->contract->value) {
            $this->error .= "Minimum withdrawal amount is $ ".number_format($min * auth()->user()->contract->value, 2)."<br>";
        }

        if ($this->amount > $max * auth()->user()->contract->value) {
            $this->error .= "Maximum withdrawal amount is $ ".number_format($max * auth()->user()->contract->value, 2)."<br>";
        }

        if($this->error){
            return;
        }

        try {
            if ($this->amount > 0) {
                $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
                $this->usdt_price = (float)$indodax[strtolower('usdt_idr')]['last'];
                $this->usdt = round((($this->amount?:0) - (($this->amount?:0) * 0.1)) * 14000 / $this->usdt_price,3);
            }
        } catch (\Throwable $th) {
            return;
        }

        DB::transaction(function () {
            $withdrawal = new Withdrawal();
            $withdrawal->wallet = auth()->user()->wallet;
            $withdrawal->amount = $this->amount;
            $withdrawal->fee = ($this->amount?:0) * 0.1;
            $withdrawal->usdt_price = $this->usdt_price;
            $withdrawal->usdt_amount = $this->usdt;
            $withdrawal->id_user = auth()->id();
            $withdrawal->save();

            $income = new \App\Models\Income();
            $income->description = "Withdrawal ".$this->usdt." USDT";
            $income->debit = $this->amount;
            $income->credit = 0;
            $income->id_user = auth()->id();
            $income->id_withdrawal = $withdrawal->id;
            $income->save();
        });
        redirect('/income');
    }

    public function render()
    {
        $data = \App\Models\Income::orderBy('created_at','asc')->where('id_user', auth()->id())->get();
        $this->available = $data->sum('credit') - $data->sum('debit');
        return view('livewire.member.income', [
            'balance' => 0,
            'data' => $data,
            'no' => ($this->page - 1) * 10
        ])->extends('layouts.default', [
            'menu' => 'Income'
        ]);
    }
}
