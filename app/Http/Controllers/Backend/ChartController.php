<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Repositories\GraphRepository;

class ChartController extends BackendController
{
    public function getChartData($id)
    {
        $graphData = new GraphRepository();
        $pieData = $graphData->pie($id);
        $barData = $graphData->bar();

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
