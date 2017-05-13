<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Property;
use App\Model\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Crypt;
use App\Queries\RecordSearch;
use Carbon\Carbon;

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
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $property = new Property();
        $property->description = $request->description;
        $property->address = $request->address;
        $property->user_id = Crypt::decryptString($request->user_id);
        $property->post_code = $request->post_code;
        $property->interest_rate = $request->interest_rate;
        $property->principal_amount = $request->principal_amount;
        $property->payment = $request->payment;
        $property->payment_date = Carbon::parse($request->payment_date);
        $property->purchased_date = Carbon::parse($request->purchased_date);
        $property->renew_date = Carbon::parse($request->renew_date);


        if ($property->save()) {
            $response = [
                'msg'     => 'property created',
                'property' => $property
            ];
        } else {
            $response = [
                'msg'     => 'property Failed',
                'property' => $property
            ];
        }

        return response()->json($response, 201);
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
        $transactions = (new RecordSearch)->search($term, $id, $this->limit);
        $credit = (Double)Transaction::where('balanceType', 'Credit')->sum('amount');
        $debit = (Double)Transaction::where('balanceType', 'Debit')->sum('amount');
        $totalAmount = sprintf('$ %s', number_format($debit - $credit, 2));

        return view('property.record', compact('transactions', 'id', 'totalAmount'));
    }
}
