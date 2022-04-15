<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Withdrawal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'withdrawal';

    protected $fillable = [
        'id_user',
        'processed_at',
        'information'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }

    public function income()
    {
        return $this->hasOne('App\Models\Income', 'id_withdrawal', 'id')->withTrashed();
    }

    public function passive()
    {
        return $this->hasOne('App\Models\PassiveIncome', 'id_withdrawal', 'id')->withTrashed();
    }
}
