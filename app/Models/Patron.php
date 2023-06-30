<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patron extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function patrons_commissions()
    {
        return $this->hasMany(PatronsCommission::class);
    }
}
