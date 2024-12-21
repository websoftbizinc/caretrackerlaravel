<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carees extends Model
{
    use HasFactory, SoftDeletes;


    public function Guardian()
    {
        return $this->belongsTo(User::class, 'guardian_id');
    }

    public function Users()
    {
        return $this->hasMany(User::class, 'id', 'guardian_id');

    }
}
