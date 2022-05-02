<?php

namespace App\Contracts;

use App\Models\Payment;
use App\Models\ShoppingCart;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;

interface PaymentGatewayContract
{
    public function connection(array $settings): self;
    public function createSession(ShoppingCart $shoppingCart, Request $request): Payment;
    public function queryPayment(Payment $payment): Payment;
}
