<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Yadahan\AuthenticationLog\AuthenticationLogable;

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
    'due_date',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  public function contract()
  {
    return $this->belongsTo(Contract::class);
  }

  public function deposit()
  {
    return $this->hasMany(Deposit::class);
  }

  public function upline()
  {
    return $this->belongsTo(User::class, 'upline_id');
  }

  public function contract_remaining()
  {
    return $this->hasOne(Bonus::class)->whereNull('withdrawal_id');
  }

  public function bonus()
  {
    if (auth()->user()->invalid_at) {
      return $this->hasMany(Bonus::class)->where('created_at', '<=', auth()->user()->invalid_at);
    } else {
      return $this->hasMany(Bonus::class);
    }
  }

  public function getWithdrawalTodayAttribute()
  {
    return $this->withdrawal()->whereRaw('SUBSTRING(created_at, 1, 10) = "' . date('Y-m-d') . '"');
  }

  public function withdrawal()
  {
    return $this->hasMany(Withdrawal::class);
  }

  public function getContractValueAttribute()
  {
    return $this->contract()->first()->name . ' - $ ' . number_format($this->contract()->first()->value);
  }

  public function getAvailableContractAttribute()
  {
    return $this->contract()->first()->benefit - $this->bonus()->sum('debit');
  }

  public function getAvailableBonusAttribute()
  {
    return $this->bonus()->sum('credit') - $this->bonus()->sum('debit');
  }

  public function pin()
  {
    return $this->hasMany(Pin::class);
  }

  public function balance()
  {
    return $this->hasMany(Balance::class);
  }

  public function getAvailablePinAttribute()
  {
    return $this->pin()->sum('credit') - $this->pin()->sum('debit');
  }

  public function getAvailableBalanceAttribute()
  {
    return $this->balance()->sum('credit') - $this->balance()->sum('debit');
  }

  public function getDownlineAttribute()
  {
    $user = auth()->user()->network . auth()->id() . '.';
    return $this->selectRaw("*, LENGTH(REPLACE(network, '" . $user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $user . "', ''), '.', '')) + 1 level")->with('contract')->where('network', 'like', $user . '%')->whereRaw("LENGTH(REPLACE(network, '" . $user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $user . "', ''), '.', '')) < 5")->get();
  }

  public function getDepositWaitingFundAttribute()
  {
    return $this->deposit->whereNull('information')->whereNull('processed_at');
  }

  public function getDepositWaitingProcessAttribute()
  {
    return $this->deposit->whereNull('processed_at');
  }

  public function getWalletShortAttribute()
  {
    return substr($this->wallet, 0, 4) . "...." . substr($this->wallet, strlen($this->wallet) - 6);
  }

  public function invalid()
  {
    return $this->hasMany(Invalid::class);
  }

  public function turnover()
  {
    return $this->hasMany(Turnover::class);
  }

  public function achievement()
  {
    return $this->hasMany(Achievement::class);
  }
}
