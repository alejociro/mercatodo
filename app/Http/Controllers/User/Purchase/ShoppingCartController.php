<?php

namespace App\Http\Controllers\User\Purchase;


use App\Actions\User\ShoppingCart\IndexShoppingCartAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index(IndexShoppingCartAction $indexShoppingCartAction)
    {
        $currency = config('app.currency');
        $shoppingCart = $indexShoppingCartAction->execute();
        return view('client.cart.index', compact('shoppingCart', 'currency'));
    }
}
