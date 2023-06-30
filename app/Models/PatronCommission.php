<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatronCommission extends Model
{
    use HasFactory;

    public function patron()
    {
        return $this->belongsTo(Patron::class);
    }

    public function sportsEvent()
    {
        return $this->belongsTo(SportsEvent::class);
    }
}
