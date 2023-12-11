<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CabbageUserRequest extends FormRequest
{
    public function rules(): array
    {
        $user = Auth::user();

        return [
            'cabbage_id' => 'required,exists:cabbages,id',
            'user_id' => ['required', 'exists:users,id', Rule::excludeIf($this->user_id === $user->id)],
            'amount' => ['required', Rule::in(25, 50, 75)]
        ];
    }
}
