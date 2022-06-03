<?php

namespace App\Http\Livewire\Member\Downline;

use App\Models\Contract;
use App\Models\Pin;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Form extends Component
{
  public $username, $name, $phone, $email, $password, $contract, $upline, $dataContract, $dataUpline, $usdtNeed, $deposit, $information, $security;

  protected $listeners = ['set:setupline' => 'setUpline'];

  public function setUpline($upline)
  {
    $this->upline = $upline;
  }

  public function mount()
  {
    $this->dataContract = Contract::all();
    $this->dataUpline = auth()->user()->downline->sortBy('name');
    $this->upline = auth()->id();
  }

  public function submit()
  {
    if (!auth()->user()->activated_at) {
      session()->flash('danger', '<b>Enrollment</b><br>You cannot do this action');
      return;
    }
    if (auth()->user()->security) {
      $this->validate([
        'username' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'password' => 'required',
        'contract' => 'required',
        'upline' => 'required',
        'security' => 'required',
      ]);
    } else {
      $this->validate([
        'username' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'password' => 'required',
        'contract' => 'required',
        'upline' => 'required',
      ]);
    }

    if (auth()->user()->security != $this->security) {
      session()->flash('danger', '<b>Security</b><br>Invalid security pin');
      return;
    }

    $dataContract = collect($this->dataContract)->where('id', $this->contract)->first();
    $dataTicket = Ticket::where('date', date('Y-m-d'))->where('amount', $dataContract->value)->orderBy('created_at', 'desc')->get();
    if ($dataTicket->count() > 0) {
      $this->ticket = $dataTicket->first()->kode;
    } else {
      $this->ticket = 1;
    }

    $this->usdtNeed = (float) round($dataContract->value * 15000 / 14500, 3) + ($this->ticket * 1 / 1000);

    if ((int) auth()->user()->available_pin < (int) $dataContract->pin_requirement) {
      session()->flash('danger', '<b>Enrollment</b><br>Insufficient pin');
      return;
    }

    if (auth()->user()->available_balance * 1 < $this->usdtNeed * 1) {
      session()->flash('danger', '<b>Enrollment</b><br>Insufficient balance');
      return;
    }

    try {
      DB::transaction(function () use ($dataContract) {
        $upline = User::where('id', $this->upline)->first();

        $user = new User();
        $user->phone = $this->phone;
        $user->username = $this->username;
        $user->password = Hash::make($this->password);
        $user->first_password = $this->password;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->contract_id = $this->contract;
        $user->upline_id = $this->upline;
        $user->reinvest = 1;
        $user->network = trim($upline->network) . $upline->id . '.';
        $user->activated_at = now();
        $user->save();

        $ticket = new Ticket();
        $ticket->contract_id = $this->contract;
        $ticket->kode = $this->ticket;
        $ticket->date = now();
        $ticket->save();

        $pin = new Pin();
        $pin->user_id = auth()->id();
        $pin->debit = $dataContract->pin_requirement;
        $pin->credit = 0;
        $pin->description = "Enrollment contract " . number_format($dataContract->value) . " username " . $this->username;
        $pin->save();

        $balance = new Pin();
        $balance->user_id = auth()->id();
        $balance->debit = $this->usdtNeed;
        $balance->credit = 0;
        $balance->description = "Enrollment contract " . number_format($dataContract->value) . " username " . $this->username;
        $balance->save();

      });

      redirect('/downline/new');
    } catch (\Exception $e) {
      session()->flash('danger', '<b>Enrollment</b><br>' . $e->getMessage());
      return;
    }
  }

  public function render()
  {
    $this->emit('reinitialize');
    return view('livewire.member.downline.form')->extends('layouts.default');
  }
}
