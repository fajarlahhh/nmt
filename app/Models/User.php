<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Yadahan\AuthenticationLog\AuthenticationLogable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hexters\CoinPayment\Entities\CoinpaymentTransaction;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, AuthenticationLogable;

    protected $table = 'user';

    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'phone',
        'actived_at',
        'google2fa_secret',
        'due_date'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function contract()
    {
        return $this->belongsTo('App\Models\Contract', 'id_contract', 'id');
    }

    public function registration_waiting_fund()
    {
        return $this->hasMany('App\Models\Deposit', 'id_owner', 'id')->whereIn('requisite', ['Registration', 'Restake'])->whereNull('information')->whereNull('processed_at');
    }

    public function registration_waiting_activated()
    {
        return $this->hasMany('App\Models\Deposit', 'id_owner', 'id')->where('requisite', 'Registration')->whereNotNull('information')->whereNull('processed_at');
    }

    public function enrollment_waiting_fund()
    {
        return $this->hasMany('App\Models\Deposit', 'id_owner', 'id')->where('requisite', 'Enrollment')->whereNull('information')->whereNull('processed_at');
    }

    public function enrollment_waiting_activated()
    {
        return $this->hasMany('App\Models\Deposit', 'id_owner', 'id')->where('requisite', 'Enrollment')->whereNotNull('information')->whereNull('processed_at');
    }

    public function renewal_waiting_fund()
    {
        return $this->hasMany('App\Models\Deposit', 'id_owner', 'id')->where('requisite', 'Renewal')->whereNull('information')->whereNull('processed_at');
    }

    public function renewal_waiting_activated()
    {
        return $this->hasMany('App\Models\Deposit', 'id_owner', 'id')->where('requisite', 'Renewal')->whereNotNull('file')->whereNotNull('information')->whereNull('id_user_waiting')->whereNull('processed_at');
    }

    public function upline()
    {
        return $this->belongsTo('App\Models\User', 'id_upline', 'id');
    }

    public function contract_remaining()
    {
        return $this->hasOne('App\Models\PassiveIncome', 'id_user', 'id')->where('type', 'contract')->whereNull('id_withdrawal');
    }

    public function benefit()
    {
        return $this->hasMany('App\Models\PassiveIncome', 'id_user', 'id')->where('type', 'benefit')->where('valid_at', '<=', now());
    }

    public function benefit_available()
    {
        return $this->hasMany('App\Models\PassiveIncome', 'id_user', 'id')->where('type', 'benefit')->whereNull('id_withdrawal');
    }

    public function passive_income()
    {
        return $this->hasMany('App\Models\PassiveIncome', 'id_user', 'id')->where('type', 'benefit');
    }

    public function active_income()
    {
        if (auth()->user()->invalid_at) {
            return $this->hasMany('App\Models\Income', 'id_user', 'id')->where('created_at', '<=', auth()->user()->invalid_at);
        } else {
            return $this->hasMany('App\Models\Income', 'id_user', 'id');
        }

    }

    public function withdrawal_active_today()
    {
        return $this->hasMany('App\Models\Withdrawal', 'id_user', 'id')->where('type', 'active')->whereRaw('SUBSTRING(created_at, 1, 10) = "' . date('Y-m-d') . '"');
    }

    public function withdrawal_all()
    {
        return $this->hasMany('App\Models\Withdrawal', 'id_user', 'id');
    }
}
