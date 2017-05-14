<?php

namespace App\Queries;
use App\Model\Transaction;

class RecordSearch {
    
    public function search($term, $id, $limit, $year)
    {
        return Transaction::where(function($query) use ($term, $id) {
            $keywords = '%' . $term . '%';
            $query->orWhere("amount", 'LIKE', $keywords);
            $query->orWhere("balanceType", 'LIKE', $keywords);
            $query->orWhere("description", 'LIKE', $keywords);
            $query->orWhere("insert_date", 'LIKE', $keywords);
        })
            ->where('property_id', $id)
            ->whereRaw('year(insert_date) =' . $year)
            ->orderBy('insert_date', 'desc')
            ->paginate($limit);
    }
    
}