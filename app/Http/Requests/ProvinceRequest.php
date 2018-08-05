<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProvinceRequest extends FormRequest
{
    public function __construct(Request $request){
        $this->id = ($request->segment(4) != 'create'? $request->segment(4) : 0);
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
            'name' => 'required|min:2|max:30|unique:provinces,name,'.$this->id
        ];
    }
}
