<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Repositories\GraphRepository;

class ChartController extends BackendController
{
    public function __construct()
    {
        /**
         * fix php7.2 version problems for laravel 5.4
         */
        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            // Ignores notices and reports all other kinds... and warnings
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
            // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
        }
    }

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
