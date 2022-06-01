<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use Livewire\WithPagination;

class Bonus extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public function render()
  {
    $this->emit('reinitialize');
    $data = \App\Models\Bonus::where('user_id', auth()->id())->orderBy('id', 'desc');
    return view('livewire.member.bonus', [
      'noUrut' => ($this->page - 1) * 10,
      'data' => $data->paginate(10),
    ])->extends('layouts.default');
  }
}
