<?php

namespace App\Actions\Admin\Api;

use App\Models\Product;

class StoreProductAction
{
    public function execute(array $data, Product $product): Product
    {
        $product->name = $data['name'];
        $product->image = $data['image'];
        $product->price = $data['price'];
        $product->stock = $data['stock'];
        $product->description = $data['description'];
        $product->category()->associate($data['category_id']);
        $product->save();

        return $product;
    }
}
