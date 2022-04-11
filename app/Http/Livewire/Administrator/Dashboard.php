<?php

namespace App\Http\Livewire\Administrator;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Bonus;
use App\Models\Daily;
use App\Models\Deposit;
use Livewire\Component;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $deposit, $withdrawal, $user;

    public function mount()
    {

        $this->deposit = Deposit::whereNull('processed_at')->whereNotNull('information')->count();
        $this->withdrawal = Withdrawal::whereNull('processed_at')->count();
        $this->user = User::whereNotNull('activated_at')->count();
    }

    public function render()
    {
        return view('livewire.administrator.dashboard', [
            'menu' => 'activation'
        ])->extends('layouts.dashboard');
    }
}
