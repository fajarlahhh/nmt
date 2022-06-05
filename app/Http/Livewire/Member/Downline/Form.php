<?php

namespace App\Http\Livewire\Member\Downline;

use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Contract;
use App\Models\Pin;
use App\Models\Ticket;
use App\Models\Turnover;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Form extends Component
{
  public $username, $name, $phone, $email, $password, $contract, $upline, $dataContract, $dataUpline, $usdtNeed, $deposit, $information, $security, $ticket;

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
    $this->usdtNeed = $dataContract->value;

    if (1 * auth()->user()->available_pin < $dataContract->pin_requirement * 1) {
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
        $ticket->amount = $dataContract->value;
        $ticket->kode = $this->ticket;
        $ticket->date = now();
        $ticket->save();

        $pin = new Pin();
        $pin->user_id = auth()->id();
        $pin->debit = $dataContract->pin_requirement;
        $pin->credit = 0;
        $pin->description = "Enrollment contract " . number_format($dataContract->value) . " username " . $this->username;
        $pin->save();

        $balance = new Balance();
        $balance->user_id = auth()->id();
        $balance->debit = $this->usdtNeed;
        $balance->credit = 0;
        $balance->description = "Enrollment contract " . number_format($dataContract->value) . " username " . $this->username;
        $balance->save();

        $member = User::where('id', $user->id)->with('contract')->with('upline.upline.upline.upline.upline')->first();
        $bonus = [];
        $turnover = [];
        $time = now();

        if ($member->upline) {
          if ($member->upline->activated_at) {
            array_push($bonus, [
              'description' => "Ref. 10% of $ " . number_format($member->contract->value) . " by " . $member->username,
              'debit' => 0,
              'credit' => $member->contract->sponsorship_benefits,
              'user_id' => $member->upline->id,
              'created_at' => $time,
              'updated_at' => $time,
            ]);

            array_push($turnover, [
              'user_id' => $member->upline->id,
              'value' => $member->contract->value,
              'downline_id' => $member->id,
              'created_at' => $time,
              'updated_at' => $time,
            ]);
          }
          if ($member->upline->upline) {
            if ($member->upline->upline->activated_at) {
              array_push($bonus, [
                'description' => "Lvl. 1 3% of $ " . number_format($member->contract->value) . " by " . $member->username,
                'debit' => 0,
                'credit' => $member->contract->first_level_benefits,
                'user_id' => $member->upline->upline->id,
                'created_at' => $time,
                'updated_at' => $time,
              ]);

              array_push($turnover, [
                'user_id' => $member->upline->upline->id,
                'value' => $member->contract->value,
                'downline_id' => $member->id,
                'created_at' => $time,
                'updated_at' => $time,
              ]);
            }
            if ($member->upline->upline->upline) {
              if ($member->upline->upline->upline->activated_at) {
                array_push($bonus, [
                  'description' => "Lvl. 2 2% of $ " . number_format($member->contract->value) . " by " . $member->username,
                  'debit' => 0,
                  'credit' => $member->contract->second_level_benefits,
                  'user_id' => $member->upline->upline->upline->id,
                  'created_at' => $time,
                  'updated_at' => $time,
                ]);

                array_push($turnover, [
                  'user_id' => $member->upline->upline->upline->id,
                  'value' => $member->contract->value,
                  'downline_id' => $member->id,
                  'created_at' => $time,
                  'updated_at' => $time,
                ]);
              }
              if ($member->upline->upline->upline->upline) {
                if ($member->upline->upline->upline->upline->activated_at) {
                  array_push($bonus, [
                    'description' => "Lvl. 3 1% of $ " . number_format($member->contract->value) . " by " . $member->username,
                    'debit' => 0,
                    'credit' => $member->contract->third_level_benefits,
                    'user_id' => $member->upline->upline->upline->upline->id,
                    'created_at' => $time,
                    'updated_at' => $time,
                  ]);

                  array_push($turnover, [
                    'user_id' => $member->upline->upline->upline->upline->id,
                    'value' => $member->contract->value,
                    'downline_id' => $member->id,
                    'created_at' => $time,
                    'updated_at' => $time,
                  ]);
                }
                if ($member->upline->upline->upline->upline->upline) {
                  if ($member->upline->upline->upline->upline->upline->activated_at) {
                    array_push($bonus, [
                      'description' => "Lvl. 4 1% of $ " . number_format($member->contract->value) . " by " . $member->username,
                      'debit' => 0,
                      'credit' => $member->contract->forth_level_benefits,
                      'user_id' => $member->upline->upline->upline->upline->upline->id,
                      'created_at' => $time,
                      'updated_at' => $time,
                    ]);

                    array_push($turnover, [
                      'user_id' => $member->upline->upline->upline->upline->upline->id,
                      'value' => $member->contract->value,
                      'downline_id' => $member->id,
                      'created_at' => $time,
                      'updated_at' => $time,
                    ]);
                  }
                }
              }
            }
          }
        }

        $dataBonus = collect($bonus)->chunk(10);
        foreach ($dataBonus as $item) {
          Bonus::insert($item->toArray());
        }
        $dataTurnover = collect($turnover)->chunk(10);
        foreach ($dataTurnover as $item) {
          Turnover::insert($item->toArray());
        }
        session()->flash('success', '<b>Enrollment</b><br>Enrollment successfully');
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
