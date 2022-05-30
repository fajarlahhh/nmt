<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
  use HasFactory;
  protected $table = 'achievement';

  public function getWaktuAttribute()
  {
    return Carbon::parse($this->created_at)->diffForHumans();
  }
}
