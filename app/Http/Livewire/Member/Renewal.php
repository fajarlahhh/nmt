<?php

namespace App\Http\Livewire\Member;

use App\Models\Bonus;
use App\Models\Contract;
use App\Models\Deposit;
use App\Models\Pin;
use App\Models\Ticket;
use App\Models\Turnover;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Renewal extends Component
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
    $this->deposit = auth()->user()->waiting_renewal->first();
  }

  public function submit()
  {
    if (auth()->user()->security) {
      $this->validate([
        'contract' => 'required',
        'security' => 'required',
      ]);
    } else {
      $this->validate([
        'contract' => 'required',
      ]);
    }

    if (auth()->user()->security != $this->security) {
      session()->flash('danger', '<b>Contract Renewal</b><br>Invalid security pin');
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

    if (auth()->user()->available_pin * 1 < $dataContract->pin_requirement * 1) {
      session()->flash('danger', '<b>Contract Renewal</b><br>Insufficient pin');
      return;
    }

    if (auth()->user()->available_balance * 1 < $this->usdtNeed * 1) {
      session()->flash('danger', '<b>Contract Renewal</b><br>Insufficient balance');
      return;
    }

    $dataContract = collect($this->dataContract)->where('id', $this->contract)->first();
    if (1 * auth()->user()->available_pin < 1 * $dataContract->pin_requirement) {
      session()->flash('danger', '<b>Contract Renewal</b><br>Insufficient pin');
      return;
    }

    try {
      $dataTicket = Ticket::where('date', date('Y-m-d'))->where('contract_id', $this->contract)->orderBy('created_at', 'desc')->get();
      if ($dataTicket->count() > 0) {
        $this->ticket = $dataTicket->first()->kode;
      } else {
        $this->ticket = 1;
      }

      DB::transaction(function () use ($dataContract) {
        $upline = User::where('id', $this->upline)->first();

        User::where('id', auth()->id())->update([
          'contract_id' => $this->contract,
          'activated_at' => now(),
          'reinvest' => auth()->user()->reinvest + 1,
        ]);

        $ticket = new Ticket();
        $ticket->amount = $dataContract->value;
        $ticket->kode = $this->ticket;
        $ticket->date = now();
        $ticket->save();

        $debet = new Pin();
        $debet->user_id = auth()->id();
        $debet->debit = $dataContract->pin_requirement;
        $debet->credit = 0;
        $debet->description = "Contract Renewal " . number_format($dataContract->value);
        $debet->save();

        $balance = new Balance();
        $balance->user_id = auth()->id();
        $balance->debit = $this->usdtNeed;
        $balance->credit = 0;
        $balance->description = "Renewal contract " . number_format($dataContract->value) . " username " . $this->username;
        $balance->save();

        $member = User::where('id', auth()->id())->with('contract')->with('upline.upline.upline.upline.upline')->first();
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
        session()->flash('success', '<b>Contract Renewal</b><br>Contract renewal successfully');
      });

      redirect('/renewal');
    } catch (\Exception$e) {
      session()->flash('danger', '<b>Contract Renewal</b><br>' . $e->getMessage());
      return;
    }
  }
  public function render()
  {
    return view('livewire.member.renewal')->extends('layouts.default');
  }
}
