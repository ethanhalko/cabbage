<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CabbageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'amount' => Rule::in(25, 50, 75),
            'type' => 'exists:cabbage_types,id'
        ];
    }
}
