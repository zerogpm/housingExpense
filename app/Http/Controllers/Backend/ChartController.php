<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Transaction;
use Illuminate\Support\Facades\DB;

class ChartController extends BackendController
{
    public function getChartData($id)
    {
        $data = Transaction::SingleProperty($id)
            ->select(DB::raw('categories_id, sum(amount) as sum'))
            ->groupBy('categories_id')
            ->get();

        $categoryID = $data->pluck('categories_id');

        $category = Category::whereIn('id', $categoryID)
            ->get();

        $title = $category->pluck('title');
        $color = $category->pluck('color');
        $sum = $data->pluck('sum');

        return view('chart.index', compact('title', 'color', 'sum'));
    }
}
