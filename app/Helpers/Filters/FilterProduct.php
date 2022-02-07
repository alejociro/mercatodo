<?php

namespace App\Helpers\Filters;

use App\Models\Product;

class FilterProduct
{
    Public Static function filter($search)
    {
        $products = Product::where('name','LIKE','%'. $search . '%');
        return $products;
    }
}
