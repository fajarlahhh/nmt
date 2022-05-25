<?php

namespace App\Http\Livewire\Member\Downline;

use App\Models\Contract;
use Livewire\Component;

class Form extends Component
{
  public $file, $phone, $payment_method, $information, $payment_time, $payment_name, $payment_wallet, $ticket, $payment_amount = 0, $data_payment, $type = 'password', $show = 'Show', $username, $password, $name, $email, $contract, $message, $position = 1, $upline, $data_upline = [], $dataContract = [], $error, $waiting = false, $payment_description, $payment_id, $deposit;

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
    $this->dataContract = Contract::all();
  }
  public function render()
  {
    return view('livewire.member.downline.form')->extends('layouts.default');
  }
}
