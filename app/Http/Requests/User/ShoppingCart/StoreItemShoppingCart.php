<?php

namespace App\Http\Requests\User\ShoppingCart;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemShoppingCart extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quantity' => 'required',
        ];
    }
}
