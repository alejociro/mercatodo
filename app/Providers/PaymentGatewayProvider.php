<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayContract;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class PaymentGatewayProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(PaymentGatewayContract::class, function () {
            $service = config('gateway.services.current');
            $gateway = config('gateway.services.'.$service);
            $gatewayClass = Arr::get($gateway, 'class');
            return (new $gatewayClass())->connection(Arr::get($gateway, 'settings'));
        });
    }
}
