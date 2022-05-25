<?php

namespace App\Http\Livewire\Member\Downline;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $user;

  public function mount()
  {
    $this->user = auth()->user()->network . auth()->id() . '.';
  }

  public function render()
  {
    $data = User::select(DB::raw("*, LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', ''))"))->with('contract')->where('network', 'like', $this->user . '%')->whereRaw("LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', '')) < 5");
    return view('livewire.member.downline.index', [
      'noUrut' => ($this->page - 1) * 10,
      'data' => $data->paginate(10),
    ])->extends('layouts.default');
  }
}
