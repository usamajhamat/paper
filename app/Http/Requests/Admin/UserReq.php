<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserReq extends FormRequest
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
            'name'=>'required',
            'username'=>'required',
            'password'=>'required',
            'role'=>'required',
            'gender'=>'required',
        ];
    }

    public function messages()
    {
        return [
             'name.required'=>'User name is required',
             'username.required'=>'Username is required',
             'password.required'=>'Password is required',
            'role.required'=>'User role is required',
            'gender.required'=>'Gender is required',
        ];
    }
}
