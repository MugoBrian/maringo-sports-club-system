<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class SportingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('amount', 'like', '%' . request('search') . '%');
        }
    }

    public function stock_item()
    {
        return $this->hasOne(StockItem::class, 'sporting_items_id');
    }

    public function order_item()
    {
        return $this->belongsToMany(OrderItem::class, 'sporting_items_id');
    }

    public function lost_item()
    {
        return $this->belongsTo(LostItem::class);
    }
}
