<?php

namespace App\Http\Livewire\Administrator;

use App\Http\Livewire\Main;
use App\Models\Bonus;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Daily extends Main
{
  use WithPagination;

  public $amount, $date;
  protected $paginationTheme = 'bootstrap';

  public function send()
  {
    $this->validate([
      'amount' => 'required',
      'date' => 'required',
    ]);

    DB::transaction(function () {
      $data = new \App\Models\Daily();
      $data->value = $this->amount;
      $data->date = $this->date;
      $data->save();

      $bonus = [];
      $time = now();
      foreach (User::with('contract')->whereNotNull('activated_at')->get() as $key => $row) {
        array_push($bonus, [
          'description' => "Daily bonus " . $this->date . " " . $this->amount . " %",
          'debit' => 0,
          'credit' => $row->contract->value * $this->amount / 100,
          'user_id' => $row->id,
          'created_at' => $time,
          'updated_at' => $time,
        ]);
      }

      $dataBonus = collect($bonus)->chunk(10);
      foreach ($dataBonus as $item) {
        Bonus::insert($item->toArray());
      }
    });
    redirect('/admin-area/daily');
  }

  public function mount()
  {
    $this->date = date('Y-m-d');
  }

  public function render()
  {
    $data = \App\Models\Daily::orderBy('created_at', 'desc')->paginate(10);
    return view('livewire.administrator.daily', [
      'data' => $data,
      'no' => ($this->page - 1) * 10,
    ])->extends('layouts.admin', [
      'menu' => 'withdrawal',
    ]);
  }
}
