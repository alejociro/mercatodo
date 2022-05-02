<?php

namespace App\Rules\Product;

class import
{
    public static function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:100'],
            'price' => ['required','numeric', 'integer', 'min:1'],
            'stock' => ['numeric', 'integer'],
            'description' => ['required', 'min:10', 'max:250'],
            'category_id' => ['numeric', 'integer', 'min:1'],
        ];
    }
}
