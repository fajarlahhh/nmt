<?php

namespace App\Http\Livewire\Administrator;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Income;
use App\Models\Rating;
use Livewire\Component;
use App\Models\Withdrawal;
use App\Models\Achievement;
use Livewire\WithPagination;
use App\Models\PassiveIncome;
use App\Models\InvalidTurnover;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Deposit extends Component
{
    use WithPagination;

    public $process = 2, $month, $year, $key, $parent = [];
    protected $queryString = ['process', 'month', 'year'];

    public function mount()
    {
        $this->month = $this->month?:date('m');
        $this->year = $this->year?:date('Y');
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
                    'id_operator' => auth()->id(),
                    'processed_at' => $time
                ]);
                User::where('id', $data->id_user)->restore();
                User::where('id', $data->id_user)->update([
                    'activated_at' => $time,
                    'invalid_at' => $valid_time
                ]);

                Income::where('id_user', $data->id_user)->delete();
                PassiveIncome::where('id_user', $data->id_user)->delete();
                Withdrawal::where('id_user', $data->id_user)->delete();

                $user = User::where('id', $data->id_user)->withTrashed()->with('contract')->with('upline.upline.upline.upline.upline')->first();
                $benefit = [];
                array_push($benefit, [
                    'amount' => $user->contract->value,
                    'type' => 'contract',
                    'id_user' => $user->id,
                    'valid_at' => $valid_time,
                    'created_at' => $time,
                    'updated_at' => $time
                ]);
                for ($i=1; $i <= 12; $i++) {
                    array_push($benefit, [
                        'amount' => $user->contract->benefit/12,
                        'type' => 'benefit',
                        'id_user' => $user->id,
                        'valid_at' => Carbon::parse($time)->addDays($i * 15)->format('Y-m-d H:m:s'),
                        'created_at' => $time,
                        'updated_at' => $time
                    ]);
                }
                PassiveIncome::insert($benefit);
                $active_income = [];

                if ($data->requisite == 'Enrollment' || $data->requisite == 'Registration') {
                    if($user->upline){
                        array_push($active_income,[
                            'description' => "Refferral income 8% of $ ".number_format($user->contract->value)." by ".$user->username,
                            'debit' => 0,
                            'credit' => $user->contract->sponsorship_benefits,
                            'id_user' => $user->upline->id,
                            'created_at' => $time,
                            'updated_at' => $time
                        ]);
                        if($user->upline->upline){
                            array_push($active_income,[
                                'description' => "Level 1 income 3% of $ ".number_format($user->contract->value)." by ".$user->username,
                                'debit' => 0,
                                'credit' => $user->contract->first_level_benefits,
                                'id_user' => $user->upline->upline->id,
                                'created_at' => $time,
                                'updated_at' => $time
                            ]);
                            if($user->upline->upline->upline){
                                array_push($active_income,[
                                    'description' => "Level 2 income 2% of $ ".number_format($user->contract->value)." by ".$user->username,
                                    'debit' => 0,
                                    'credit' => $user->contract->second_level_benefits,
                                    'id_user' => $user->upline->upline->upline->id,
                                    'created_at' => $time,
                                    'updated_at' => $time
                                ]);
                                if($user->upline->upline->upline->upline){
                                    array_push($active_income,[
                                        'description' => "Level 3 income 1% of $ ".number_format($user->contract->value)." by ".$user->username,
                                        'debit' => 0,
                                        'credit' => $user->contract->third_level_benefits,
                                        'id_user' => $user->upline->upline->upline->upline->id,
                                        'created_at' => $time,
                                        'updated_at' => $time
                                    ]);
                                    if($user->upline->upline->upline->upline->upline){
                                        array_push($active_income,[
                                            'description' => "Level 4 income 1% of $ ".number_format($user->contract->value)." by ".$user->username,
                                            'debit' => 0,
                                            'credit' => $user->contract->forth_level_benefits,
                                            'id_user' => $user->upline->upline->upline->upline->upline->id,
                                            'created_at' => $time,
                                            'updated_at' => $time
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }

                $data_active_income = collect($active_income)->chunk(10);
                foreach ($data_active_income as $item)
                {
                    Income::insert($item->toArray());
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
            'no' => ($this->page - 1) * 10
        ])->extends('layouts.default', [
            'menu' => 'deposit'
        ]);
    }
}
