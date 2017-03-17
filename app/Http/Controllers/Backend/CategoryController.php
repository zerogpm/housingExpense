<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

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
    
    public function store(CategoryRequest $request)
    {

        $existedColor = Category::where('color', $request->color)->get();

        if($existedColor->count()) {
            $response = [
                'msg'     => 'error',
                'color' => 'you picked this color before!',
                'value' => $existedColor
            ];
            return response()->json($response, 201);
        }

        $category = new Category();
        $category->title = $request->title;
        $category->color = $request->color;

        if ($category->save()) {
            $response = [
                'msg'     => 'category created',
                'transcation' => $category
            ];
        } else {
            $response = [
                'msg'     => 'category Failed',
                'transcation' => $category
            ];
        }
        return response()->json($response, 201);
    }
}
