<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeCategory extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->hasMany(Members::class,'age_category_id');
    }
}
