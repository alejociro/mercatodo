<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:100'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required', 'same:confirm-password'],
        ];
    }
}
