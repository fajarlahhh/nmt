<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
  use HasFactory;

  protected $table = 'daily';

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function operator()
  {
    return $this->belongsTo(User::class, 'operator_id');
  }
}
