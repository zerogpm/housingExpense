<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Model\Transaction;

class GraphRepository {

    public function pie($id)
    {
        return Transaction::SingleProperty($id)
            ->select(DB::raw('categories_id, sum(amount) as sum'))
            ->groupBy('categories_id')
            ->get();
    }

    public function bar()
    {
        return Transaction::select(DB::raw('sum(amount) as barSum, monthname(insert_date) as barMonth'))
            ->groupBy(DB::raw('monthname(insert_date)'))
            ->whereRaw("year(insert_date) = 2017 AND balanceType = 'Debit' ")
            ->get();
    }

}
