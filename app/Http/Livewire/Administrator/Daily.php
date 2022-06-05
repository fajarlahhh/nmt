<?php

namespace App\Http\Livewire\Administrator;

use App\Http\Livewire\Main;
use App\Models\Bonus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Daily extends Main
{
  use WithPagination;

  public $amount, $date, $today;
  protected $paginationTheme = 'bootstrap';

  public function mount()
  {
    $this->date = date('Y-m-d');
  }

  public function send()
  {

    $this->today = Carbon::parse($this->date)->dayOfWeek;
    $this->validate([
      'amount' => 'required',
      'date' => 'required',
    ]);

    if (\App\Models\Daily::where('date', $this->date)->count() > 0) {
      session()->flash('danger', '<b>Daily</b><br>You have done this action');
      return;
    }

    if ($this->today < 1 || $this->today > 5) {
      session()->flash('danger', '<b>Daily</b><br>You cant do this action in weekend');
      return;
    }

    DB::transaction(function () {
      $data = new \App\Models\Daily();
      $data->value = $this->amount;
      $data->date = $this->date;
      $data->operator_id = auth()->id();
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
