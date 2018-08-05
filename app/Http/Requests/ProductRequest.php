<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
{
    public function __construct(Request $request){
        $this->id = ($request->segment(3) != 'create'? $request->segment(3) : 0);
    }
    
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
            'name' => 'required|min:2|max:30',
            'price' => 'required|min:100|max:10000000|integer',
            'discount' => 'min:0|max:100|numeric',
            'category_id' => 'required',
        ];
    }
}
