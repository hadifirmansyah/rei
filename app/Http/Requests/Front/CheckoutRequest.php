<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CheckoutRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:30|alpha',
            'last_name' => 'required|min:2|max:30|alpha',
            'province_id' => 'required',
            'city_id' => 'required',
            'sub_district_id' => 'required',
            'address' => 'required',
            'phone_number' => 'required|digits_between:10,13|numeric',
            'email' => 'required|email',
        ];
    }
}
