<?php

namespace App\Helpers\ShoppingCart;

use App\Models\ShoppingCart;

class ShoppingCartTotalHelper
{
    public Static function totalOfCart(ShoppingCart $shoppingCart): int
    {
        $totalPrice = 0;
        foreach ($shoppingCart->shoppingCartItems as $product) {
            $priceProduct = $product->product->price;
            $productQuantity = $product->quantity;
            $totalPrice += $priceProduct * $productQuantity;
        }
        return $totalPrice;
    }
}
