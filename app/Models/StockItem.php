<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;

    public function sporting_item()
    {
        return $this->belongsTo(SportingItem::class);
    }
}
