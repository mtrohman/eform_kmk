<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'duration' => 'required',
        ];
    }
}