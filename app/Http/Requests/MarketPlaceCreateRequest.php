<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketPlaceCreateRequest extends FormRequest
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
            'business_name'    => 'required|max:190',
            'settlement_bank' => 'required',
            'account_number'   => 'required'
        ];
    }
}
