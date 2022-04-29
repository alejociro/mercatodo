<?php

namespace App\Actions\User\Payments;

use App\Contracts\PaymentGatewayContract;
use App\Models\Payment;

class PaymentIndexUserAction
{
    public function execute(PaymentGatewayContract $paymentGatewayContract)
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
        return $payments;
    }
}
