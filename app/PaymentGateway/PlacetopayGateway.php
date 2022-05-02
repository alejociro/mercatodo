<?php

namespace App\PaymentGateway;

use App\Actions\Payment\ConsultPaymentAction;
use App\Actions\Payment\ProcessPaymentResponseAction;
use App\Actions\Payment\StorePaymentAction;
use App\Contracts\PaymentGatewayContract;
use App\Exceptions\GatewayException;
use App\Helpers\ShoppingCart\ShoppingCartTotalHelper;
use App\Models\Payment;
use App\Models\ShoppingCart;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Throwable;

class PlacetopayGateway implements PaymentGatewayContract
{
    protected PlacetoPay $placetopay;

    public function connection(array $settings): self
    {
        $this->placetopay = new PlacetoPay([
            'login' => Arr::get($settings, 'login'),
            'tranKey' => Arr::get($settings, 'tranKey'),
            'baseUrl' => Arr::get($settings, 'baseUrl'),
            'timeout' => 10,
        ]);
        return $this;
    }

    public function createSession(ShoppingCart $shoppingCart, Request $request): Payment
    {
        $totalPrice = ShoppingCartTotalHelper::totalOfCart($shoppingCart);
        try {
            $payment = StorePaymentAction::execute(new Payment(), $shoppingCart, $request->ip(), $totalPrice);
            $request = [
                'payment' => [
                    'reference' => $payment->reference,
                    'description' => $payment->description,
                    'amount' => [
                        'currency' => 'COP',
                        'total' => $totalPrice,
                    ],
                ],
                'payer' => [
                    'document' => $payment->user->document,
                    'documentType' => 'CC',
                    'name' => $payment->user->name,
                    'surname' => $payment->user->surname,
                    'email' => $payment->user->email,
                    'mobile' => $payment->user->cellphone,
                ],
                'expiration' => date('c', strtotime('+30 minutes')),
                'returnUrl' => route('payments.index'),
                'ipAddress' => $request->ip(),
                'userAgent' => $request->userAgent(),
            ];
            $response = $this->placetopay->request($request);
            return ProcessPaymentResponseAction::execute($response, $payment);
        } catch (Throwable $exception) {
            report($exception);
            throw new GatewayException($exception->getMessage());
        }
    }

    public function queryPayment(Payment $payment): Payment
    {
        $response = $this->placetopay->query($payment->request_id);
        try {
            ConsultPaymentAction::consult($response, $payment);
        } catch (Throwable $exception) {
            report($exception);
            throw new GatewayException($exception->getMessage());
        }
        return $payment;
    }
}
