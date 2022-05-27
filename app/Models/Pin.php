<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pin extends Model
{
  use HasFactory;
  protected $table = 'pin';

  public function getNilaiAttribute()
  {
    return (float) $this->debit > 0 ? -1 * $this->debit : $this->credit;
  }

  public function getWaktuAttribute()
  {
    return Carbon::parse($this->created_at)->diffForHumans();
  }
}
