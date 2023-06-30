<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    public function sporting_item()
    {
        return $this->belongsToMany(SportingItem::class);
    }

    public function surchaged_fee()
    {
        return $this->belongsTo(SurchagedFee::class);
    }
}
