<?php

namespace App\Actions\User\Payments;

use App\Contracts\PaymentGatewayContract;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentIndexUserAction
{
    public function execute(PaymentGatewayContract $paymentGatewayContract): LengthAwarePaginator
    {
        $userNow = auth()->user()->id;
        $payments = Payment::where('user_id', $userNow)->paginate(10);
        foreach ($payments as $payment) {
            if ($payment->status == 'pending' && $payment->request_id) {
                $paymentGatewayContract->queryPayment($payment);
            }
        }
        return $payments;
    }
}
