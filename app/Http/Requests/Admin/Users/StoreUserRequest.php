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
            'name' => ['required', 'min:3', 'max:100'],
            'surname' => ['required', 'min:3', 'max:100'],
            'email' => ['required','email','unique:users,email'],
            'phone' => ['required', 'min:8', 'max:14'],
            'document' => ['required', 'min:8', 'max:14'],
            'password' => ['required', 'same:confirm-password'],
        ];
    }
}
