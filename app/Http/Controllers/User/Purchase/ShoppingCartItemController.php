<?php

namespace App\Http\Controllers\User\Purchase;

use App\Actions\Admin\DeleteModelAction;
use App\Actions\User\ShoppingCart\StoreItemInCartAction;
use App\Actions\User\ShoppingCart\UpdateItemInCartAction;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoppingCartItemController extends Controller
{
    public function store(Request $request, ShoppingCart $shoppingCart, Product $product, StoreItemInCartAction $storeItemInCartAction): RedirectResponse
    {
        return $storeItemInCartAction->execute($request->all(), $shoppingCart, $product);
    }

    public function show(Product $product): View
    {
        $currency = config('app.currency');
        return view('admin.products.show', compact('product', 'currency'));
    }

    public function update(Request $request, Product $product, UpdateItemInCartAction $updateItemInCartAction): RedirectResponse
    {
        return $updateItemInCartAction->execute($request->all(), $product);
    }

    public function destroy(ShoppingCartItem $shoppingCartItem, DeleteModelAction $deleteModelAction): RedirectResponse
    {
        $deleteModelAction->execute($shoppingCartItem);
        return redirect()->route('shoppingCartUser');
    }
}
