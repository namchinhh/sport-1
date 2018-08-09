<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'option_id' => 'required|integer',
            'total_price' => 'required|double',
            'option_chosen' => 'string',
            'status' => 'string',
            //
        ];
    }
}
