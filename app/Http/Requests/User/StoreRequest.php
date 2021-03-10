<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|regex:/^[0-9A-Za-z]+$/u|unique:users|min:6|max:16',
            'password' => 'required|confirmed|min:6|max:32',
        ];
    }

    public function messages()
    {
        return [
            'username.regex' => 'Apenas letras ou números no campo :attribute',
        ];
    }
}
