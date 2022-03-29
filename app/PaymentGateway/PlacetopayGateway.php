<?php

namespace App\PaymentGateway;

use App\Contracts\PaymentGatewayContract;
use App\Exceptions\GatewayException;
use App\Models\Payment;
use App\Models\ShoppingCart;
use App\Models\User;
use App\Notifications\PaymentNotification;
use Carbon\Carbon;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
        $totalPrice = 0;
        foreach ($shoppingCart->shoppingCartItems as $product) {
            $priceProduct = $product->product->price;
            $productQuantity = $product->quantity;
            $totalPrice += $priceProduct * $productQuantity;
        }

        try {
            $payment = new Payment();
            $payment->shopping_cart_id = $shoppingCart->id;
            $payment->reference = Str::random(10);
            $payment->status = 'pending';
            $payment->user_id = auth()->user()->id;
            $payment->amount = $totalPrice;
            $payment->payer_document = auth()->user()->document;
            $payment->payer_ip = $request->ip();
            $payment->description = 'El perro Ama a estefania';
            $payment->save();
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
                'returnUrl' => route('products.index', $payment),
                'ipAddress' => $request->ip(),
                'userAgent' => $request->userAgent(),
            ];
            $response = $this->placetopay->request($request);
            if ($response->isSuccessful()) {
                $payment->process_url = $response->processUrl();
                $payment->request_id = $response->requestId();
                $payment->status = 'pending';
                $payment->save();
                auth()->user()->shoppingCartUserCreate();
                return $payment;
            }
            $payment->status = 'rejected';
            $payment->save();
            return $payment;
        } catch (Throwable $exception) {
            report($exception);
            throw new GatewayException($exception->getMessage());
        }
    }

    public function queryPayment(Payment $payment): Payment
    {
        $response = $this->placetopay->query($payment->request_id);

        try {
            if ($response->isSuccessful()) {
                if ($response->status()->isApproved()) {
                    $payment->status = 'successful';
                    $payment->paid_at = new Carbon($response->status()->date());
                    $payment->receipt = Arr::get($response->payment(), 'receipt');
                    $idCart = $payment->shopping_cart_id;
                    $shoppingCart = ShoppingCart::find($idCart);
                    foreach ($shoppingCart->shoppingCartItems as $product) {
                        $productQuantity = $product->quantity;
                        $productStock = $product->product->stock;
                        $stockNow = $productStock - $productQuantity;
                        $product->product->stock = $stockNow;
                        $product->product->save();

                        $userNotify = User::find($payment->user_id);
                        $userNotify->notify(new PaymentNotification($payment));
                    }
                } elseif ($response->status()->isRejected()) {
                    $payment->status = 'rejected';
                }
                $payment->save();
            }
        } catch (Throwable $exception) {
            report($exception);
            throw new GatewayException($exception->getMessage());
        }
        return $payment;
    }

}
