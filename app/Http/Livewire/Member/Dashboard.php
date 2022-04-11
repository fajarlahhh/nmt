<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use App\Models\Income;
use Livewire\Component;
use App\Models\Withdrawal;
use App\Models\Achievement;
use App\Models\Information;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $benefit, $history, $active_income, $information, $contract, $gift, $total_wd, $notification = [];

    public function mount()
    {
        $this->benefit = auth()->user()->benefit_available? auth()->user()->benefit_available->sum('amount'): 0;
        $this->active_income = auth()->user()->active_income;
        $this->contract = auth()->user()->contract_remaining? auth()->user()->contract_remaining->amount:0;
        $this->history = auth()->user()->withdrawal_all;
    }

    public function render()
    {
        return view('livewire.member.dashboard', [
            'menu' => 'dashboard'
        ])->extends('layouts.dashboard');
    }
}
