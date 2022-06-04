<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
  use HasFactory;
  protected $table = 'pin';

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function getNilaiAttribute()
  {
    return $this->debit > 0 ? -1 * $this->debit : 1 * $this->credit;
  }

  public function getWaktuAttribute()
  {
    return Carbon::parse($this->created_at)->diffForHumans();
  }
}
