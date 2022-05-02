<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;

class StoreProductAction
{
    public function execute(array $data, Product $product, array $image, $id): Product
    {
        $product->name = $data['name'];
        $product->image = $image['image'];
        $product->price = $data['price'];
        $product->stock = $data['stock'];
        $product->description = $data['description'];
        $product->category()->associate($id);
        $product->save();

        return $product;
    }
}
