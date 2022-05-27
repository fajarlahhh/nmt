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

  public function registration_waiting_fund()
  {
    return $this->hasMany(Deposit::class, 'owner_id')->whereIn('requisite', ['Registration', 'Restake'])->whereNull('information')->whereNull('processed_at');
  }

  public function registration_waiting_activated()
  {
    return $this->hasMany(Deposit::class, 'owner_id')->where('requisite', 'Registration')->whereNotNull('information')->whereNull('processed_at');
  }

  public function deposit()
  {
    return $this->hasMany(Deposit::class, 'owner_id');
  }

  public function renewal_waiting_activated()
  {
    return $this->hasMany(Deposit::class, 'owner_id')->where('requisite', 'Renewal')->whereNotNull('file')->whereNotNull('information')->whereNull('id_user_waiting')->whereNull('processed_at');
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

  public function withdrawal_today()
  {
    return $this->hasMany(Withdrawal::class)->where('type', 'active')->whereRaw('SUBSTRING(created_at, 1, 10) = "' . date('Y-m-d') . '"');
  }

  public function withdrawal_all()
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

  public function getAvailablePinAttribute()
  {
    return $this->pin()->sum('credit') - $this->pin()->sum('debit');
  }

  public function getDownlineAttribute()
  {
    return $this->selectRaw("*, LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', '')) + 1 level")->with('contract')->where('network', 'like', $this->user . '%')->whereRaw("LENGTH(REPLACE(network, '" . $this->user . "', '')) - LENGTH(REPLACE(REPLACE(network, '" . $this->user . "', ''), '.', '')) < 5")->get();
  }

  public function getWaitingRenewalAttribute()
  {
    return $this->deposit()->where('requisite', 'Renewal')->whereNull('information')->whereNull('processed_at')->count();
  }

  public function getWaitingEnrollmentAttribute()
  {
    return $this->deposit()->where('requisite', 'Enrollment')->whereNotNull('information')->whereNull('processed_at')->count();
  }

  public function getWaitingActivationAttribute()
  {
    return $this->deposit()->where('requisite', 'Enrollment')->whereNull('information')->whereNull('processed_at')->count();
  }
}
