<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Transaction;
use Illuminate\Support\Facades\DB;

class ChartController extends BackendController
{
    public function getChartData($id)
    {
        $pieData = Transaction::SingleProperty($id)
            ->select(DB::raw('categories_id, sum(amount) as sum'))
            ->groupBy('categories_id')
            ->get();

        $barData = Transaction::select(DB::raw('sum(amount) as barSum, ANY_VALUE(monthname(insert_date)) as barMonth'))
            ->groupBy(DB::raw('year(insert_date), month(insert_date)'))
            ->whereRaw("year(insert_date) = 2017 AND balanceType = 'Debit' ")
            ->get();

        $barDataKeyAndValue = $barData->pluck('barSum', 'barMonth');

        $barSum = $barDataKeyAndValue->values();
        $barMonth = $barDataKeyAndValue->keys();


        $categoryID = $pieData->pluck('categories_id');

        $category = Category::whereIn('id', $categoryID)
            ->get();

        $barTitle = $category->pluck('title');
        $barColor = $category->pluck('color');
        $pieSum = $pieData->pluck('sum');

        return view('chart.index', compact('barTitle', 'barColor', 'pieSum', 'barSum', 'barMonth', 'id'));
    }
}
