<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClassReq extends FormRequest
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

            'course'=>'required',
            'class'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'course.required'=>'course name is required',
            'class.required'=>'class name is required',
        ];
    }
}
