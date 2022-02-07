<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['min:5','string', 'max:100'],
            'price' => ['integer', 'min:1'],
            'stock' => ['integer', 'min:0'],
            'description' => ['min:10', 'max:250'],
        ];
    }
}
