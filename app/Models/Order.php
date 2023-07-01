<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Members::class);
    }

    public function sporting_item()
    {
        return $this->belongsTo(SportingItem::class, 'sporting_item_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {

            $query->where('product_name', 'like', '%' . request('search') . '%')
                ->orWhere('quantity', 'like', '%' . intval(request('search')) . '%');
        }
    }
}
