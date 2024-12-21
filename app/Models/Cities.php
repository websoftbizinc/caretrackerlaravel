<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    public function Country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function State()
    {
        return $this->belongsTo(States::class, 'state_id');
    }
}
