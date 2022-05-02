<?php

namespace App\Helpers\Filters;

use App\Models\Product;

class FilterProduct
{
    public static function filter($search, ?string $category)
    {
        $products = Product::where('name', 'LIKE', '%'. $search . '%')
            ->when($category, function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->orderby('name');
        return $products;
    }
}
