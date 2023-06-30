<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsEvent extends Model
{
    use HasFactory;

    public function facilitationFees()
    {
        return $this->hasMany(FacilitationFee::class, 'sports_event_id');
    }

    public function members()
    {
        return $this->belongsToMany(Member::class, 'member_id');
    }

    public function patronsCommissions()
    {
        return $this->hasMany(PatronsCommission::class);
    }
}
