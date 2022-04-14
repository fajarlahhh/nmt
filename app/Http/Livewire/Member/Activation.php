<?php

namespace App\Http\Livewire\Member;

use App\Models\Ticket;
use App\Models\Deposit;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Activation extends Component
{
    use WithFileUploads;

    public $data_payment, $error, $contract, $method, $wallet, $coin, $amount, $name, $description, $deposit, $time, $ticket, $file, $information;

    public function mount()
    {
        $this->deposit = auth()->user()->registration_waiting_fund;
    }

    public function done()
    {
        $this->validate([
            'information' => 'required'
        ]);

        Deposit::where('id', $this->deposit->first()->id)->where('requisite', 'Registration')->whereNull('processed_at')->whereNull('information')->update([
            'information' => $this->information
        ]);
        redirect('/activation');
    }

    public function submit()
    {
        $this->validate([
            'method' => 'required',
        ]);

        if (auth()->user()->registration_waiting_fund->count() == 0) {
            DB::transaction(function () {
                $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
                $payment = $this->data_payment->where('id', $this->method)->first();
                $payment_idr = (float)$indodax[strtolower($payment->alias)]['last'];
                $this->amount = (float)ceil(auth()->user()->contract_price * 15000 / $payment_idr);
                $data_ticket = Ticket::where('date', date('Y-m-d'))->where('contract_price', auth()->user()->contract_price)->orderBy('created_at', 'desc')->get();
                if ($data_ticket->count() > 0) {
                    $this->ticket = $data_ticket->first()->kode;
                } else {
                    $this->ticket = 1;
                }

                $ticket = new Ticket();
                $ticket->contract_price = auth()->user()->contract_price;
                $ticket->kode = $this->ticket;
                $ticket->date = now();
                $ticket->save();

                $deposit = new Deposit();
                $deposit->id_member = auth()->id();
                $deposit->coin_name = $payment->name;
                $deposit->wallet = $payment->wallet;
                $deposit->amount = $this->amount + $this->ticket;
                $deposit->requisite = 'Registration';
                $deposit->save();
            });
        }

        redirect('/activation');
    }

    public function render()
    {
        return view('livewire.member.activation', [
            'menu' => 'activation'
        ])->extends('layouts.default');
    }
}
