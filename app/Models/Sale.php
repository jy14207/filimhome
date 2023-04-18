<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public function commodity()
    {
        return $this->hasOne(Commodity::class,'id' ,'commodity_id');
    }
}
