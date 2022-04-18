<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Deposit;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Contract;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Enrollment extends Component
{
    use WithFileUploads;

    public $file, $phone, $payment_method, $information, $payment_time, $payment_name, $payment_wallet, $ticket, $payment_amount = 0, $data_payment, $type = 'password', $show = 'Show', $username, $password, $name, $email, $contract, $message, $position = 1, $upline, $data_upline = [], $data_contract = [], $error, $waiting = false, $payment_description, $payment_id, $deposit;

    protected $listeners = ['set:setupline' => 'setUpline'];

    public function setUpline($upline)
    {
        $this->upline = $upline;
    }

    public function mount()
    {
        $this->upline = auth()->id();
        if (auth()->user()->invalid_at >= date('Y-m-d H:m:s')) {
            $this->deposit = auth()->user()->enrollment_waiting_fund;
        }
        $this->data_contract = Contract::all();
    }

    public function done()
    {
        $this->validate([
            'information' => 'required'
        ]);

        DB::transaction(function () {
            Deposit::where('id', $this->deposit->first()->id)->where('requisite', 'Enrollment')->whereNull('processed_at')->whereNull('information')->update([
                'information' => $this->information
            ]);

            User::where('id', $this->deposit->first()->id_user)->restore();
        });
        redirect('/enrollment');
    }

    public function cancel($id)
    {
        User::where('id', $id)->whereNull('activated_at')->forceDelete();
    }

    public function showHide($type)
    {
        $this->emit('reinitialize');
        if ($type == 'Show') {
            $this->show = "Hide";
            $this->type = "text";
        } else {
            $this->show = "Show";
            $this->type = "password";
        }
    }

    public function submit()
    {
        $this->error = null;
        if ($this->waiting == true) {
            $this->error .= "You must complete the previous registration";
            return;
        }

        $this->validate([
            'phone' => 'required',
            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'contract' => 'required'
        ]);

        if (User::where('username', $this->username)->withTrashed()->count() > 0) {
            $this->error .= "Username already exist";
        }

        if ($this->error) {
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
            $upline = User::where('id', $this->upline)->first();

            $user = new User();
            $user->phone = $this->phone;
            $user->username = $this->username;
            $user->password = Hash::make($this->password);
            $user->first_password = $this->password;
            $user->name = $this->name;
            $user->email = $this->email;
            $user->id_contract = $this->contract;
            $user->id_upline = $this->upline;
            $user->network = trim($upline->network) . $upline->id . '.';
            $user->referral = md5($this->username);
            $user->deleted_at = now();
            $user->save();

            $ticket = new Ticket();
            $ticket->id_contract = $this->contract;
            $ticket->kode = $this->ticket;
            $ticket->date = now();
            $ticket->save();

            $deposit = new Deposit();
            $deposit->id_owner = auth()->id();
            $deposit->id_user = $user->id;
            $deposit->wallet = config('constants.wallet');
            $deposit->amount = $this->payment_amount;
            $deposit->requisite = 'Enrollment';
            $deposit->save();
        });

        redirect('/enrollment');
    }

    public function render()
    {
        $this->emit('reinitialize');
        return view('livewire.member.enrollment')->extends('layouts.default', [
            'menu' => 'enrollment'
        ]);
    }
}
