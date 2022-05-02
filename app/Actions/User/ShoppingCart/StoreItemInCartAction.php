<?php

namespace App\Actions\User\ShoppingCart;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\RedirectResponse;

class StoreItemInCartAction
{
    public function execute(array $data, ShoppingCart $shoppingCart, Product $product): RedirectResponse
    {
        $shoppingCartItem= auth()->user()->shoppingCartUser()->shoppingCartItems;
        $itemSelected = 0;
        $totalQuantity = 0 ;
        foreach ($shoppingCartItem as $item) {
            if ($item->product_id == $product->id) {
                $itemSelected = $item;
                $totalQuantity = ($item->quantity) + ($data['quantity']);
            }
        }
        if ($totalQuantity <= $product->stock and $totalQuantity != 0) {
            $data = (['amount' => $totalQuantity]);
            $itemSelected->update($data);
            return redirect()->route('shoppingCartUser');
        } elseif ($totalQuantity > $product->stock) {
            return redirect()->route('shoppingCartUser');
        }
        if ($data['quantity'] <= $product->stock) {
            $shoppingCart->shoppingCartItems()->create([
                'product_id' => $product->getKey(),
                'quantity' => $data['quantity'],
                'total' => $product->price
            ]);
            return redirect()->route('productos');
        } else {
            return redirect()->route('productosr');
        }
    }
}
