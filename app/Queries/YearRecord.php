<?php
/**
 * Created by PhpStorm.
 * User: jiansu
 * Date: 2017-05-14
 * Time: 10:55 AM
 */

namespace App\Queries;
use App\Model\Transaction;
use Illuminate\Support\Facades\DB;

class YearRecord
{
    public function yearList()
    {
        return Transaction::select(DB::raw('DISTINCT year(insert_date) as yearList'))
            ->orderBy('yearList', 'desc')
            ->get();
    }
}