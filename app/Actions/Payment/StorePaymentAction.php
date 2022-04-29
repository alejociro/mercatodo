<?php

namespace App\Actions\Payment;

use App\Models\Payment;
use App\Models\ShoppingCart;
use Illuminate\Support\Str;

class StorePaymentAction
{
    public static function execute(Payment $payment, ShoppingCart $shoppingCart, $ip, $totalPrice): Payment
    {
        $payment->shopping_cart_id = $shoppingCart->id;
        $payment->reference = Str::random(10);
        $payment->status = 'pending';
        $payment->user_id = auth()->user()->id;
        $payment->amount = $totalPrice;
        $payment->payer_document = auth()->user()->document;
        $payment->payer_ip = $ip;
        $payment->description = 'klasjdkljasdkljaskldjasklsadjlkasdjasd asdqweg';
        $payment->save();

        return $payment;
    }
}
