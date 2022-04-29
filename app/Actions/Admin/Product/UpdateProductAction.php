<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;

class UpdateProductAction
{
    public function execute(array $data,Product $product, $id): Product
    {
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->stock = $data['stock'];
        $product->description = $data['description'];
        $product->category()->associate($id);
        $product->save();

        return $product;
    }
}
