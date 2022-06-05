<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Dashboard extends Component
{
  public $pin, $user, $today, $time, $dataContract, $contract;

  public $availableActive = 0, $amountActive = 0, $usdtWd = 0, $usdtPrice = 0, $activeData;

  public $bonusData;

  public function mount()
  {
    $this->user = auth()->user()->network . auth()->id() . '.';
    dd(Hash::make('erul'));
  }

  public function render()
  {
    $this->availableActive = auth()->user()->active_income ? auth()->user()->active_income->sum('credit') - auth()->user()->active_income->sum('debit') : 0;
    return view('livewire.member.dashboard', [
      'entrant' => User::select(DB::raw("*, LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', '')) + 1 level"))->with('contract')->where('network', 'like', $this->user . '%')->whereRaw("LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', '')) < 5")->get(),
      'bonus' => auth()->user()->benefit_available ? auth()->user()->benefit_available->sum('amount') : 0,
      'active' => auth()->user()->active_income,
      'contract' => auth()->user()->contract_remaining ? auth()->user()->contract_remaining->amountActive : 0,
      'history' => auth()->user()->withdrawal_all,
      'menu' => 'dashboard',
    ])->extends('layouts.default');
  }
}
