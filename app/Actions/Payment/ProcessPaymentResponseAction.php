<?php

namespace App\Actions\Payment;

use App\Models\Payment;

class ProcessPaymentResponseAction
{
    public static function execute($response, Payment $payment): Payment
    {
        if ($response->isSuccessful()) {
            $payment->process_url = $response->processUrl();
            $payment->request_id = $response->requestId();
            $payment->status = 'pending';
            $payment->save();
            auth()->user()->shoppingCartUserCreate();
        } else {
            $payment->status = 'rejected';
            $payment->save();
        }
        return $payment;
    }
}
