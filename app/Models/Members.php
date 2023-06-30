<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'age_category_id',
        'membership_type_id',
        'gender',
        'nextofkin',
        'dob',
        'contact',
        'subcounty',
        'school',
        'games',
        'weight',
        'height',
        'specialneeds',
        'enrolledas',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'games_member', 'member_id', 'game_id');
    }

    public function age_category()
    {
        return $this->belongsTo(AgeCategory::class, 'age_category_id');
    }

    public function membership_type()
    {
        return $this->belongsTo(MembershipType::class, 'membership_type_id');
    }

    public function membership_fee()
    {
        return $this->belongsTo(MembershipFee::class, 'member_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('fullname', 'like', '%' . request('search') . '%')
                ->orWhere('gender', 'like', '%' . request('search') . '%')
                ->orWhere('school', 'like', '%' . request('search') . '%');
        }
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function surchaged_fees()
    {
        return $this->belongsToMany(SurchagedFee::class);
    }
    public function facilitationFees()
    {
        return $this->hasMany(FacilitationFee::class, 'member_id');
    }

    public function events()
    {
        return $this->belongsToMany(SportsEvent::class, 'sports_event_id');
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
