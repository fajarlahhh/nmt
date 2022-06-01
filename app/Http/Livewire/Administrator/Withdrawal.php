<?php

namespace App\Http\Livewire\Administrator;

use App\Http\Livewire\Main;
use Livewire\WithPagination;

class Withdrawal extends Main
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $process = 0, $month, $year, $key, $information;
  protected $queryString = ['process'];

  public function cancel()
  {
    $this->key = null;
  }

  public function setKey($key)
  {
    $this->key = $key;
    $this->information = null;
  }

  public function updated()
  {
    $this->resetPage();
  }

  public function send()
  {
    $this->validate([
      'information' => 'required',
    ]);

    \App\Models\Withdrawal::where('id', $this->key)->update([
      'txid' => $this->information,
      'id_operator' => auth()->id(),
      'processed_at' => now(),
    ]);
    $this->key = null;
    $this->information = null;
  }

  public function render()
  {
    $data = \App\Models\Withdrawal::with('user')->orderBy('created_at');
    if ($this->process == 1) {
      $data = $data->whereNotNull('processed_at');
    } else {
      $data = $data->whereNull('processed_at');
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
