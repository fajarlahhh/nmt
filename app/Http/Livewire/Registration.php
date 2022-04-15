<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Deposit;
use Livewire\Component;
use App\Models\Contract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

class Registration extends Component
{
    public $username, $password, $name, $email, $contract, $referral, $message, $ref, $upline, $data_contract, $payment_amount, $ticket;

    protected $queryString = ['ref'];

    public function login()
    {
        redirect('/login');
    }

    public function mount()
    {
        $this->data_contract = Contract::all();

        if ($this->ref) {
            $this->upline = User::where('referral', $this->ref)->first();
        }
    }

    public function submit()
    {
        $error = '';
        if ($this->ref) {
            $this->validate([
                'username' => 'required',
                'password' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'contract' => 'required'
            ]);
        } else {
            $this->validate([
                'username' => 'required',
                'password' => 'required',
                'referral' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'contract' => 'required'
            ]);
        }


        if (!$this->ref) {
            $this->upline = User::where('username', $this->referral)->first();
        }

        if (!$this->upline) {
            $error .= "Referral not found";
        }

        if (User::where('username', $this->username)->withTrashed()->count() > 0) {
            $error .= "Username already exist";
        }

        if ($error) {
            session()->flash('error', $error);
            return;
        }

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

        DB::transaction(function () {
            $user = new User();
            $user->username = $this->username;
            $user->password = Hash::make($this->password);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->id_contract = $this->contract;
            $user->id_upline = $this->upline->id;
            $user->network = trim($this->upline->network) . $this->upline->id . '.';
            $user->referral = md5($this->username);
            $user->save();

            $ticket = new Ticket();
            $ticket->id_contract = $this->contract;
            $ticket->kode = $this->ticket;
            $ticket->date = now();
            $ticket->save();

            $deposit = new Deposit();
            $deposit->id_owner = $user->id;
            $deposit->id_user = $user->id;
            $deposit->wallet = config('constants.wallet');
            $deposit->amount = $this->payment_amount;
            $deposit->requisite = 'Registration';
            $deposit->save();

            if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
                Auth::logoutOtherDevices($this->password, 'password');
                return redirect('activation');
            }
        });
    }

    public function render()
    {
        Auth::logout();
        return view('livewire.registration', [
            'menu' => 'registration'
        ])->extends('layouts.auth');
    }
}
