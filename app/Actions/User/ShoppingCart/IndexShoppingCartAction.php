<?php

namespace App\Actions\User\ShoppingCart;

use App\Models\ShoppingCart;

class IndexShoppingCartAction
{
    public function execute(): ShoppingCart
    {
        $shoppingCart = auth()->user()->shoppingCartUser();
        $totalPrice = 0;
        foreach ($shoppingCart->shoppingCartItems as $product) {
            $priceProduct = $product->product->price;
            $productQuantity = $product->quantity;
            $totalPrice += $priceProduct * $productQuantity;
            $product->total = $product->quantity * $product->product->price;
            $product->save();
        }
        $shoppingCart->total = $totalPrice;
        $shoppingCart->save();

        return $shoppingCart;
    }
}
