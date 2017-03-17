<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required',
            'address' => 'required',
            'user_id' => 'required',
            'post_code' => 'required',
            'interest_rate' => 'required|Numeric',
            'principal_amount' => 'required|Numeric',
            'payment' => 'required|Numeric',
            'payment_date' => 'required|Date',
            'purchased_date' => 'required|Date',
            'renew_date' => 'required|Date',
        ];
    }
}
