<?php

namespace App\Http\Livewire\Administrator;

use App\Http\Livewire\Main;
use App\Models\Bonus;
use App\Models\Turnover;
use App\Models\User;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class Deposit extends Main
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public $process = 2, $month, $year, $key, $parent = [];
  protected $queryString = ['process', 'month', 'year'];

  public function mount()
  {
    $this->month = $this->month ?: date('m');
    $this->year = $this->year ?: date('Y');
  }

  public function cancel()
  {
    $this->key = null;
  }

  public function setKey($key)
  {
    $this->key = $key;
  }

  public function updated()
  {
    $this->resetPage();
  }

  public function delete()
  {
    $data = \App\Models\Deposit::findOrFail($this->key)->delete();
  }

  public function process()
  {
    DB::transaction(function () {
      $time = now();
      $valid_time = Carbon::parse($time)->addDays(180)->format('Y-m-d H:m:s');
      $data = \App\Models\Deposit::where('id', $this->key)->whereNull('processed_at')->get();
      if ($data->count() > 0) {
        $data = $data->first();
        \App\Models\Deposit::where('id', $this->key)->update([
          'operator_id' => auth()->id(),
          'processed_at' => $time,
        ]);
        User::where('id', $data->user_id)->restore();
        User::where('id', $data->user_id)->update([
          'activated_at' => $time,
        ]);

        Bonus::where('user_id', $data->user_id)->delete();
        Withdrawal::where('user_id', $data->user_id)->delete();

        $user = User::where('id', $data->user_id)->withTrashed()->with('contract')->with('upline.upline.upline.upline.upline')->first();

        $bonus = [];
        $turnover = [];

        if ($data->requisite == 'Enrollment' || $data->requisite == 'Registration') {
          if ($user->upline) {
            if ($user->upline->activated_at) {
              array_push($bonus, [
                'description' => "Ref. 10% of $ " . number_format($user->contract->value) . " by " . $user->username,
                'debit' => 0,
                'credit' => $user->contract->sponsorship_benefits,
                'user_id' => $user->upline->id,
                'created_at' => $time,
                'updated_at' => $time,
              ]);

              array_push($turnover, [
                'user_id' => $user->upline->id,
                'value' => $user->contract->value,
                'downline_id' => $user->id,
                'created_at' => $time,
                'updated_at' => $time,
              ]);
            }
            if ($user->upline->upline) {
              if ($user->upline->upline->activated_at) {
                array_push($bonus, [
                  'description' => "Lvl. 1 3% of $ " . number_format($user->contract->value) . " by " . $user->username,
                  'debit' => 0,
                  'credit' => $user->contract->first_level_benefits,
                  'user_id' => $user->upline->upline->id,
                  'created_at' => $time,
                  'updated_at' => $time,
                ]);

                array_push($turnover, [
                  'user_id' => $user->upline->upline->id,
                  'value' => $user->contract->value,
                  'downline_id' => $user->id,
                  'created_at' => $time,
                  'updated_at' => $time,
                ]);
              }
              if ($user->upline->upline->upline) {
                if ($user->upline->upline->upline->activated_at) {
                  array_push($bonus, [
                    'description' => "Lvl. 2 2% of $ " . number_format($user->contract->value) . " by " . $user->username,
                    'debit' => 0,
                    'credit' => $user->contract->second_level_benefits,
                    'user_id' => $user->upline->upline->upline->id,
                    'created_at' => $time,
                    'updated_at' => $time,
                  ]);

                  array_push($turnover, [
                    'user_id' => $user->upline->upline->upline->id,
                    'value' => $user->contract->value,
                    'downline_id' => $user->id,
                    'created_at' => $time,
                    'updated_at' => $time,
                  ]);
                }
                if ($user->upline->upline->upline->upline) {
                  if ($user->upline->upline->upline->upline->activated_at) {
                    array_push($bonus, [
                      'description' => "Lvl. 3 1% of $ " . number_format($user->contract->value) . " by " . $user->username,
                      'debit' => 0,
                      'credit' => $user->contract->third_level_benefits,
                      'user_id' => $user->upline->upline->upline->upline->id,
                      'created_at' => $time,
                      'updated_at' => $time,
                    ]);

                    array_push($turnover, [
                      'user_id' => $user->upline->upline->upline->upline->id,
                      'value' => $user->contract->value,
                      'downline_id' => $user->id,
                      'created_at' => $time,
                      'updated_at' => $time,
                    ]);
                  }
                  if ($user->upline->upline->upline->upline->upline) {
                    if ($user->upline->upline->upline->upline->upline->activated_at) {
                      array_push($bonus, [
                        'description' => "Lvl. 4 1% of $ " . number_format($user->contract->value) . " by " . $user->username,
                        'debit' => 0,
                        'credit' => $user->contract->forth_level_benefits,
                        'user_id' => $user->upline->upline->upline->upline->upline->id,
                        'created_at' => $time,
                        'updated_at' => $time,
                      ]);

                      array_push($turnover, [
                        'user_id' => $user->upline->upline->upline->upline->upline->id,
                        'value' => $user->contract->value,
                        'downline_id' => $user->id,
                        'created_at' => $time,
                        'updated_at' => $time,
                      ]);
                    }
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
      }
    });
    $this->key = null;
  }

  public function render()
  {
    $data = \App\Models\Deposit::with('owner')->whereNotNull('information')->orderBy('created_at');
    if ($this->process == 1) {
      $data = $data->whereNotNull('processed_at');
    } else {
      $data = $data->whereNull('processed_at');
    }

    $data = $data->paginate(10);
    return view('livewire.administrator.deposit', [
      'data' => $data,
      'no' => ($this->page - 1) * 10,
    ])->extends('layouts.admin');
  }
}
