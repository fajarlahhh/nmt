<?php

namespace App\Http\Livewire\Administrator;

use App\Http\Livewire\Main;
use Livewire\WithPagination;

class Withdrawal extends Main
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $status = 1, $month, $year, $key, $delete, $process, $information;
  protected $queryString = ['status'];

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
    \App\Models\Withdrawal::findOrFail($this->delete)->delete();
    $this->delete = null;
    $this->key = null;
  }

  public function restore($key)
  {
    \App\Models\Withdrawal::withTrashed()->findOrFail($key)->restore();
  }

  public function process()
  {
    $this->validate([
      'information' => 'required',
    ]);

    \App\Models\Withdrawal::where('id', $this->key)->update([
      'txid' => $this->information,
      'operator_id' => auth()->id(),
      'processed_at' => now(),
    ]);
    $this->key = null;
    $this->information = null;
  }

  public function render()
  {
    $data = \App\Models\Withdrawal::with('user')->with('operator')->orderBy('created_at');
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
    return view('livewire.administrator.withdrawal', [
      'data' => $data,
      'no' => ($this->page - 1) * 10,
    ])->extends('layouts.admin', [
      'menu' => 'withdrawal',
    ]);
  }
}
