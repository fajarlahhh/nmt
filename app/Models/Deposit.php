<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deposit extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'deposit';

  protected $fillable = [
    'id_user',
    'processed_at',
  ];

  public function operator()
  {
    return $this->belongsTo(User::class, 'operator_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class)->withTrashed();
  }

  public function getNilaiAttribute()
  {
    return $this->amount * 1;
  }
}
