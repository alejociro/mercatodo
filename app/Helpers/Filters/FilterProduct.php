<?php

namespace App\Helpers\Filters;

use App\Models\Product;

class FilterProduct
{
    public static function filter($search)
    {
        $products = Product::where('name', 'LIKE', '%'. $search . '%')->orderby('name');
        return $products;
    }
}
