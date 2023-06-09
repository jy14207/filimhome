<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;
    public function combo()
    {
        return $this->hasOne(Combos::class,'id' ,'resource');
    }
}
