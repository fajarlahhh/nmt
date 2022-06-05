<?php

namespace App\Http\Livewire\Administrator;

use App\Http\Livewire\Main;
use App\Models\Balance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class Deposit extends Main
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public $key, $process, $delete, $status = 1, $month, $year;
  protected $queryString = ['status', 'month', 'year'];

  public function mount()
  {
    $this->month = $this->month ?: date('m') * 1;
    $this->year = $this->year ?: date('Y');
  }

  public function cancel()
  {
    $this->process = null;
    $this->delete = null;
    $this->key = null;
  }

  public function setDelete($key)
  {
    $this->delete = $key;
    $this->key = $key;
  }

  public function setProses($key)
  {
    $this->process = $key;
    $this->key = $key;
  }

  public function updated()
  {
    $this->resetPage();
  }

  public function delete()
  {
    $this->error = null;
    \App\Models\Deposit::findOrFail($this->delete)->delete();
    $this->delete = null;
    $this->key = null;
  }

  public function restore($key)
  {
    \App\Models\Deposit::withTrashed()->findOrFail($key)->restore();
  }

  public function process()
  {
    DB::transaction(function () {
      \App\Models\Deposit::where('id', $this->process)->update([
        'operator_id' => auth()->id(),
        'processed_at' => now(),
      ]);

      $data = \App\Models\Deposit::where('id', $this->process)->first();

      $balance = new Balance();
      $balance->user_id = $data->user_id;
      $balance->debit = 0;
      $balance->credit = $data->amount;
      $balance->description = "Deposit";
      $balance->save();
    });
    $this->key = null;
    $this->process = null;
  }

  public function render()
  {
    $data = \App\Models\Deposit::with('user')->with('operator')->whereNotNull('information')->orderBy('created_at');
    switch ($this->status) {
      case '1':
        $data = $data->whereNull('processed_at');
        break;

      case '2':
        $data = $data->where('processed_at', 'like', date('Y-m', strtotime($this->year . '-' . $this->month . '-01')) . '%');
        break;

      case '3':
        $data = $data->onlyTrashed();
        break;
    }
    $data = $data->paginate(10);
    return view('livewire.administrator.deposit', [
      'data' => $data,
      'no' => ($this->page - 1) * 10,
    ])->extends('layouts.admin');
  }
}
