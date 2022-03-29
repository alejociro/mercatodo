<?php

namespace App\Http\Controllers\User\Purchase;

use App\Contracts\PaymentGatewayContract;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(PaymentGatewayContract $paymentGatewayContract)
    {
        $userNow = auth()->user()->id;
        $payments = Payment::where('user_id', $userNow)->paginate(10);
        foreach ($payments as $payment)
            {
                if($payment->status == 'pending')
                {
                    $paymentGatewayContract->queryPayment($payment);
                }
            }
        return view('client.payment.index', compact('payments'));
    }

    public function store(Request $request, PaymentGatewayContract $paymentGatewayContract)
    {
        $shoppingCart = auth()->user()->shoppingCartUser();
        $payment = $paymentGatewayContract->createSession($shoppingCart, $request);

        return $payment->status=='pending' ? redirect($payment->process_url): redirect()->route('products.index');
    }

    public function show(Payment $payment): View
    {
        $currency = config('app.currency');
        $idCart = $payment->shopping_cart_id;
        $shoppingCart = ShoppingCart::find($idCart);
        return view('client.payment.show',compact('payment', 'shoppingCart','currency'));
    }

    public function update(Request $request, $id)
    {
        //
    }
}
