<?php

namespace App\Http\Livewire\Administrator;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Bonus;
use App\Models\Daily;
use App\Models\Deposit;
use Livewire\Component;
use App\Models\Withdrawal;
use App\Http\Livewire\Member\Main;
use Illuminate\Support\Facades\DB;

class Dashboard extends Main
{
    public $deposit, $withdrawal, $user;

    public function mount()
    {
        $this->deposit = Deposit::all();
        $this->withdrawal = Withdrawal::all();
        $this->user = User::whereNotNull('activated_at')->whereNotNull('invalid_at')->count();
    }

    public function render()
    {
        return view('livewire.administrator.dashboard')->extends('layouts.admin');
    }
}
