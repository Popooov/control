<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = ['date', 'reason', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
