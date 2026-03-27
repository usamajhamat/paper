<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Account extends FormRequest
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
    public function rules()
    {
        return [

            'email'=>'required',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Username is required',
            'password.required'=>'Password is required',
        ];
    }

}
