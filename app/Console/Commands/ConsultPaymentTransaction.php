<?php

namespace App\Console\Commands;

use App\Jobs\ConsultPayment;
use App\Jobs\ConsultPaymentJob;
use App\Models\Payment;
use Illuminate\Console\Command;

class ConsultPaymentTransaction extends Command
{
    protected $signature = 'command:name';

    protected $description = 'Command description';

    public function handle()
    {
        $payments = Payment::whereIn('status', 'pending')->get();
        foreach ($payments as $payment)
        {
            ConsultPaymentJob::dispatch($payment);
        }
    }
}
