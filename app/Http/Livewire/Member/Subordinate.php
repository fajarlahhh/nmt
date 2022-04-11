<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Subordinate extends Component
{
    public $key;

    protected $queryString = ['key'];

    public function mount()
    {
        $this->key = $this->key?:auth()->id();
    }

    public function setKey($key)
    {
        $this->key = $key;
        $this->emit('reinitialize');
    }

    public function render()
    {
        $this->emit('reinitialize');
        $user = User::findOrFail($this->key)->network.User::findOrFail($this->key)->id.'.';
        $data = User::select(DB::raw("*, LENGTH(REPLACE(network, '".$user."', '')) - LENGTH(REPLACE(REPLACE(network, '".auth()->id().".', ''), '.', '')) + 2 level"))->where('network', 'like', $user.'%')->whereRaw("LENGTH(REPLACE(network, '".$user."', '')) - LENGTH(REPLACE(REPLACE(network, '".$user."', ''), '.', '')) < 5")->get();

        return view('livewire.member.subordinate', [
            'data' => $data
        ])->extends('layouts.default', [
            'menu' => 'subordinate'
        ]);
    }
}
