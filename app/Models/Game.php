<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function members()
    {

        return $this->belongsToMany(Members::class, 'games_member', 'game_id', 'member_id');
    }

    public function patrons()
    {
        return $this->hasMany(Patron::class);
    }

    public function captains()
    {
        return $this->hasMany(Captain::class);
    }
}
