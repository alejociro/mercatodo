<?php

namespace App\Actions\Payment;

use App\Events\ProductSoldEvent;
use App\Models\Payment;
use App\Models\ShoppingCart;
use App\Models\User;
use App\Notifications\PaymentNotification;

class DecreaseProductStockAction
{
    public static function execute(Payment $payment)
    {
        $idCart = $payment->shopping_cart_id;
        $shoppingCart = ShoppingCart::find($idCart);

        foreach ($shoppingCart->shoppingCartItems as $product) {
            $productQuantity = $product->quantity;
            $productStock = $product->product->stock;
            $stockNow = $productStock - $productQuantity;
            $product->product->stock = $stockNow;
            $product->product->save();
            $count = 1;
            while ($count <= $productQuantity) {
                ProductSoldEvent::dispatch($product->product, $product->product->name);
                $count++;
            }
            $userNotify = User::find($payment->user_id);
            $userNotify->notify(new PaymentNotification($payment));
        }
    }
}
