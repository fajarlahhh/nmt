<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Withdrawal extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'withdrawal';

  protected $fillable = [
    'id_user',
    'processed_at',
    'information',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function income()
  {
    return $this->hasOne(Income::class)->withTrashed();
  }
}
