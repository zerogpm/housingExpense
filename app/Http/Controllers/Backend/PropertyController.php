<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Property;
use App\Model\Transaction;
use Illuminate\Http\Request;

class PropertyController extends BackendController
{
    protected $limit = 6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('Create new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        $categories = Category::pluck('title', 'id');
        return view('property.show', compact('property', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function record(Request $request, $id)
    {
        $term = $request->term;
        $transactions = Transaction::where(function($query) use ($term, $id) {
            $keywords = '%' . $term . '%';
            $query->orWhere("amount", 'LIKE', $keywords);
            $query->orWhere("balanceType", 'LIKE', $keywords);
            $query->orWhere("description", 'LIKE', $keywords);
            $query->orWhere("date", 'LIKE', $keywords);
        })
            ->where('property_id', $id)
            ->orderBy('date', 'desc')
            ->paginate($this->limit);

        return view('property.record', compact('transactions', 'id'));
    }
}
