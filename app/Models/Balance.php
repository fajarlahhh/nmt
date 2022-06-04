<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'balance';

  public function getNilaiAttribute()
  {
    return $this->debit > 0 ? -1 * $this->debit : 1 * $this->credit;
  }

  public function getWaktuAttribute()
  {
    return Carbon::parse($this->created_at)->diffForHumans();
  }
}
