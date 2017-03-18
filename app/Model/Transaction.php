<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function scopeSingleProperty($query, $id)
    {
        $query->where('property_id', '=', $id);
    }
}
