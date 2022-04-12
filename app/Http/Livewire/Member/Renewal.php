<?php

namespace App\Http\Livewire\Member;

use App\Models\Ticket;
use App\Models\Deposit;
use Livewire\Component;
use App\Models\Contract;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Renewal extends Component
{
    use WithFileUploads;

    public $data_contract, $error, $contract, $wallet, $coin, $amount, $name, $alias, $description, $deposit, $time, $ticket, $file, $information, $payment_amount;

    public function mount()
    {
        if (auth()->user()->invalid_at <= date('Y-m-d H:m:s')) {
            $this->deposit = auth()->user()->enrollment_waiting_fund;
        }
        $this->data_contract = Contract::where('value', '>=', auth()->user()->contract->value)->get();
    }

    public function updated()
    {
        try {
            $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
            $payment_idr = (float)$indodax[strtolower('usdt_idr')]['last'];
            $this->amount = (float)round(collect($this->data_contract)->where('id', $this->contract)->first()->value * 15000 / $payment_idr, 3);
        } catch (\Throwable $th) {
            return;
        }
    }

    public function done()
    {
        $this->validate([
            'information' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $file = null;
        if ($this->file) {
            $image = $this->file;
            $file_name = auth()->user()->username . date('-Ymd-') . time() . uniqid();
            $img = Image::make($image->getRealPath())->encode('png', 100)->fit(760, null, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });;
            $img->stream();
            Storage::disk('public')->put('deposit/' . $file_name . '.png', $img);
            $img->destroy();

            $file = 'deposit/' . $file_name . '.png';
        }

        $deposit = Deposit::findOrFail(auth()->user()->renewal_waiting_fund->first()->id);
        $deposit->information = $this->information;
        $deposit->file = $file;
        $deposit->save();
        redirect('/renewal');
    }

    public function submit()
    {
        $this->validate([
            'contract' => 'required'
        ]);

        try {
            $data_ticket = Ticket::where('date', date('Y-m-d'))->where('id_contract', $this->contract)->orderBy('created_at', 'desc')->get();
            if ($data_ticket->count() > 0) {
                $this->ticket = $data_ticket->first()->kode;
            } else {
                $this->ticket = 1;
            }

            $indodax = Http::get('https://indodax.com/api/summaries')->collect()->first();
            $payment_idr = (float)$indodax[strtolower('usdt_idr')]['last'];
            $this->payment_amount = (float)round(collect($this->data_contract)->where('id', $this->contract)->first()->value * 15000 / $payment_idr, 3) + ($this->ticket * 1 / 1000);
        } catch (\Throwable $th) {
            return;
        }

        if (auth()->user()->renewal_waiting_fund->count() == 0) {
            DB::transaction(function () {
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
                $deposit->requisite = 'Renewal';
                $deposit->save();
            });
        }

        redirect('/renewal');
    }

    public function render()
    {
        $data = Deposit::where('id_user', auth()->id())->get();
        return view('livewire.member.renewal', [
            'data' => $data
        ])->extends('layouts.default', [
            'menu' => 'renewal'
        ]);
    }
}
