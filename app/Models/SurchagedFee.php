<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurchagedFee extends Model
{
    use HasFactory;

    public function lost_item()
    {
        return $this->belongsTo(LostItem::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
