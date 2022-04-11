<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Withdrawal;
use App\Models\PassiveIncome;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Contractbenefit extends Component
{
    public $contract, $benefit, $usdt_price, $usdt, $error;

    public function mount()
    {
        $this->contract = auth()->user()->contract_remaining? auth()->user()->contract_remaining->amount: 0;
        $this->benefit = auth()->user()->benefit;
    }

    public function claimContract()
    {
        DB::transaction(function () {
            $income = PassiveIncome::findOrFail($key);

            $withdrawal = new Withdrawal();
            $withdrawal->wallet = auth()->user()->wallet;
            $withdrawal->amount = $income->amount;
            $withdrawal->fee = ($income->amount?:0) * 0.1;
            $withdrawal->usdt_price = $this->usdt_price;
            $withdrawal->usdt_amount = $this->usdt;
            $withdrawal->id_user = auth()->id();
            $withdrawal->save();

            PassiveIncome::where('id', $key)->update([
                'id_withdrawal' => $withdrawal->id,
            ]);
        });
    }

    public function claimPassive($key)
    {
        $data = PassiveIncome::where('id', $key)->whereNull('id_withdrawal')->where('valid_at', '<=', now())->get();
        if($data->count() > 0){
            $this->error = null;

            if (!auth()->user()->wallet) {
                $this->error .= "You haven't entered your wallet address yet<br>";
            }

            if($this->error){
                return;
            }

            $income = PassiveIncome::findOrFail($key);
            try {
                $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
                $this->usdt_price = (float)$indodax[strtolower('usdt_idr')]['last'];
                $this->usdt = round((($income->amount?:0) - (($income->amount?:0) * 0.1)) * 14000 / $this->usdt_price,3);
            } catch (\Throwable $th) {
                return;
            }

            DB::transaction(function () use ($income, $key) {
                $withdrawal = new Withdrawal();
                $withdrawal->wallet = auth()->user()->wallet;
                $withdrawal->amount = $income->amount;
                $withdrawal->fee = ($income->amount?:0) * 0.1;
                $withdrawal->usdt_price = $this->usdt_price;
                $withdrawal->usdt_amount = $this->usdt;
                $withdrawal->id_user = auth()->id();
                $withdrawal->save();

                PassiveIncome::where('id', $key)->update([
                    'id_withdrawal' => $withdrawal->id,
                ]);
            });
            redirect('/contractbenefit');
        }
    }

    public function render()
    {
        $data = \App\Models\Income::orderBy('created_at','desc')->where('id_user', auth()->id())->get();
        return view('livewire.member.contractbenefit')->extends('layouts.default', [
            'menu' => 'Income'
        ]);
    }
}
