<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $limit = 6;

    public function index(Request $request)
    {
        $term = $request->term;
        $categories = Category::where(function($query) use ($term) {
            $keywords = '%' . $term . '%';
            $query->orWhere("title", 'LIKE', $keywords);
            $query->orWhere("created_at", 'LIKE', $keywords);
        })
            ->orderBy('created_at', 'desc')
            ->paginate($this->limit);
        return view('category.index', compact('categories'));
    }
}
