<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:100','unique:products'],
            'price' => ['required','numeric', 'integer', 'min:1'],
            'stock' => ['required','numeric', 'integer', 'min:0'],
            'description' => ['required', 'min:10', 'max:250'],
        ];
    }
}
