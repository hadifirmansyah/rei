<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    // public function __construct(Request $request){
    //     $this->id = ($request->segment(3) != 'create'? $request->segment(3) : 0);
    // }
    
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
            'email' => 'required|email|unique:users,email,'.$this->id,
            'phone_number' => 'required|digits_between:10,13|numeric|unique:users,phone_number,'.$this->id,
            'password' => 'required|min:8|max:20',
            'password_confirmation' => 'required|same:password',
        ];
    }
}
