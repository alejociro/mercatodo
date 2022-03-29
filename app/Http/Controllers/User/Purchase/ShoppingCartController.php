<?php

namespace App\Http\Controllers\User\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $currency = config('app.currency');
        $shoppingCart = auth()->user()->shoppingCartUser();
        $totalPrice = 0;
        foreach ($shoppingCart->shoppingCartItems as $product){
            $priceProduct = $product->product->price;
            $productQuantity = $product->quantity;
            $totalPrice += $priceProduct * $productQuantity;
            $product->total = $product->quantity * $product->product->price;
            $product->save();
        }
        $shoppingCart->total = $totalPrice;
        $shoppingCart->save();
        return view('client.cart.index', compact('shoppingCart', 'currency'));
    }
}
