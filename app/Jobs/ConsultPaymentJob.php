<?php

namespace App\Jobs;

use App\Contracts\PaymentGatewayContract;
use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConsultPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Payment $payment;
    protected PaymentGatewayContract $gateway;

    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
        $this->gateway = resolve(PaymentGatewayContract::class);
    }

    public function handle(): void
    {
        $this->gateway->queryPayment($this->payment);
    }
}
