<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bonus extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'bonus';

  public function withdrawal()
  {
    return $this->belongsTo(Withdrawal::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function getWaktuAttribute()
  {
    return Carbon::parse($this->created_at)->diffForHumans();
  }

  public function getNilaiAttribute()
  {
    return (float) $this->debit > 0 ? -1 * $this->debit : $this->credit;
  }
}
