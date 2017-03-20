<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Transaction;
use Illuminate\Support\Facades\DB;

class ChartController extends BackendController
{
    public function getChartData($id)
    {
        $barData = Transaction::SingleProperty($id)
            ->select(DB::raw('categories_id, sum(amount) as sum'))
            ->groupBy('categories_id')
            ->get();

        $donutData = Transaction::select(DB::raw('sum(amount) as donutSum, ANY_VALUE(monthname(insert_date)) as donutMonth'))
            ->groupBy(DB::raw('year(insert_date), month(insert_date)'))
            ->get();

        $donutDataKeyAndValue = $donutData->pluck('donutSum', 'donutMonth');

        $donutSum = $donutDataKeyAndValue->values();
        $donutMonth = $donutDataKeyAndValue->keys();

        $categoryID = $barData->pluck('categories_id');

        $category = Category::whereIn('id', $categoryID)
            ->get();

        $barTitle = $category->pluck('title');
        $barColor = $category->pluck('color');
        $barSum = $barData->pluck('sum');

        return view('chart.index', compact('barTitle', 'barColor', 'barSum', 'donutSum', 'donutMonth', 'id'));
    }
}
