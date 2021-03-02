<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return (bool) auth()->user();
    }

    public function rules()
    {
        return [
            'body' => 'required',
            'destination_id' => [
                'required',
                'exists:users,id',
                Rule::notIn([auth()->user()->id])
            ]
        ];
    }
}
