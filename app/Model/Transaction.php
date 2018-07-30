<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'insert_date'
    ];

    public function scopeSingleProperty($query, $id)
    {
        $query->where('property_id', '=', $id);
    }
}
