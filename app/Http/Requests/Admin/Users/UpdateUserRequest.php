<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['min:3', 'max:100'],
            'surname' => ['min:3', 'max:100'],
            'email' => ['email'],
            'phone' => ['min:8', 'max:14'],
            'document' => ['min:8', 'max:14'],
            'password' => ['same:confirm-password'],
        ];
    }
}
