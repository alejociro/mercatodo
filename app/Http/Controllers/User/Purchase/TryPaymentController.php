<?php

namespace App\Http\Controllers\User\Purchase;

use App\Contracts\PaymentGatewayContract;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class TryPaymentController extends Controller
{
    public function store(Request $request, PaymentGatewayContract $paymentGatewayContract, Payment $payment)
    {
        $idCart = $payment->shopping_cart_id;
        $shoppingCart= ShoppingCart::find($idCart);

        $payment = $paymentGatewayContract->createSession($shoppingCart, $request);

        return $payment->status=='pending' ? redirect($payment->process_url): redirect()->route('products.index');
    }

}
