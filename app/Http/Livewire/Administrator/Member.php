<?php

namespace App\Http\Livewire\Administrator;

use App\Models\User;
use App\Models\Deposit;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Member extends Component
{
    use WithPagination;

    public $key, $active = 1, $error;

    protected $queryString = ['active'];

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
        $this->error =  null;
        $data = User::findOrFail($this->key);
        if (Deposit::where('id_member', $data->id)->whereNotNull('file')->whereNotNull('information')->count() > 0) {
            $this->error = 'The member has already made a payment';
            return;
        }else{
            $data->forceDelete();
        }
    }

    public function render()
    {
        $data = User::select('*')->orderBy('username')->where('role', 1);
        if ($this->active == 1) {
            $data = $data->whereNotNull('activated_at');
        } else {
            $data = $data->whereNull('activated_at');
        }

        $data = $data->paginate(10);
        return view('livewire.administrator.member', [
            'data' => $data,
            'no' => ($this->page - 1) * 10
        ])->extends('layouts.default', [
            'menu' => 'member'
        ]);
    }
}
