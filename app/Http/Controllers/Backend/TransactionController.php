<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TranscationRequest;
use App\Http\Controllers\Controller;
use App\Model\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class TransactionController extends Controller
{
    public function store(TranscationRequest $request)
    {
        $transaction = new Transaction;
        $transaction->amount = $request->amount;
        $transaction->balanceType = $request->balanceType;
        $transaction->description = $request->note;
        $transaction->categories_id = $request->categories;
        $transaction->user_id = Crypt::decryptString($request->userID);
        $transaction->property_id = Crypt::decryptString($request->propertyID);
        $transaction->date = Carbon::parse($request->date);

        if ($transaction->save()) {
            $response = [
                'msg'     => 'transcation created',
                'transcation' => $transaction
            ];
        } else {
            $response = [
                'msg'     => 'transcation Failed',
                'transcation' => $transaction
            ];
        }

        return response()->json($response, 201);
    }
}
