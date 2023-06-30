<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipFee extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->belongsTo(MembershipFee::class, 'member_id');
    }

    public function membership_type()
    {
        return $this->belongsTo(MembershipType::class, 'membership_type_id');
    }
}
