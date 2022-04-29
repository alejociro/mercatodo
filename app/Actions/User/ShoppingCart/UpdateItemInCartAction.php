<?php

namespace App\Actions\User\ShoppingCart;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class UpdateItemInCartAction
{
    public function execute(array $data, Product $product): RedirectResponse
    {
        $shoppingCartItem= auth()->user()->shoppingCartUser()->shoppingCartItems;
        $totalQuantity = $data['quantity'];
        foreach ($shoppingCartItem as $item){
            if ($item->product_id == $product->id){
                $itemSelected = $item;
                if ($totalQuantity > $product->stock){
                    return redirect()->route('shoppingCartUser');
                }else{
                    $data=(['quantity'=>$totalQuantity]);
                    $itemSelected->update($data);
                    return redirect()->route('shoppingCartUser');
                }
            }
        }
    }
}
