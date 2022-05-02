<?php

namespace App\Actions\Payment;

use App\Models\Payment;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class ConsultPaymentAction
{
    public static function consult($response, Payment $payment)
    {
        if ($response->isSuccessful()) {
            if ($response->status()->isApproved()) {
                $payment->status = 'successful';
                $payment->paid_at = new Carbon($response->status()->date());
                $payment->receipt = Arr::get($response->payment(), 'receipt');
                DecreaseProductStockAction::execute($payment);
            } elseif ($response->status()->isRejected()) {
                $payment->status = 'rejected';
            }
            $payment->save();
        }
    }
}
