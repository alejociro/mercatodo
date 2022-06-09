<?php

namespace App\Http\Controllers\User\Purchase;

use App\Actions\User\Payments\PaymentIndexUserAction;
use App\Contracts\PaymentGatewayContract;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\ShoppingCart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(PaymentGatewayContract $paymentGatewayContract, PaymentIndexUserAction $paymentIndexUserAction): View
    {
        $payments = $paymentIndexUserAction->execute($paymentGatewayContract);
        return view('client.payment.index', compact('payments'));
    }

    public function store(Request $request, PaymentGatewayContract $paymentGatewayContract): RedirectResponse
    {
        $shoppingCart = auth()->user()->shoppingCartUser();
        $payment = $paymentGatewayContract->createSession($shoppingCart, $request);

        return $payment->status=='pending' ? redirect($payment->process_url) : redirect()->route('payments.index');
    }

    public function show(Payment $payment): View
    {
        $currency = config('app.currency');
        $shoppingCart = ShoppingCart::find($payment->shopping_cart_id);
        return view('client.payment.show', compact('payment', 'shoppingCart', 'currency'));
    }
}
