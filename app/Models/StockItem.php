<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'sporting_items_id',
    ];

    public function sporting_item()
    {
        return $this->belongsTo(SportingItem::class, 'sporting_items_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            
            $query->where('sporting_items_id', 'like', '%' . request('search'). '%')
                ->orWhere('quantity', 'like', '%' . intval(request('search')) . '%');
                
        }
    }
}
