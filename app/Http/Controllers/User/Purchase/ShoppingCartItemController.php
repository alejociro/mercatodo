<?php

namespace App\Http\Controllers\User\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoppingCartItemController extends Controller
{
    public function store(Request $request, ShoppingCart $shoppingCart, Product $product): RedirectResponse
    {
        $shoppingCartItem= auth()->user()->shoppingCartUser()->shoppingCartItems;
        $itemSelected = 0;
        $totalQuantity = 0 ;
        foreach($shoppingCartItem as $item){
            if($item->product_id == $product->id ){
                $itemSelected = $item;
                $totalQuantity = ($item->quantity) + ($request->input('quantity'));
            }
        }
        if($totalQuantity <= $product->stock and $totalQuantity != 0){
            $data = (['amount' => $totalQuantity]);
            $itemSelected->update($data);
            return redirect()->route('shoppingCartUser');
        }elseif ($totalQuantity > $product->stock){
            return redirect()->route('shoppingCartUser');
        }
        if($request->input('quantity') <= $product->stock){
            $shoppingCart->shoppingCartItems()->create([
                'product_id' => $product->getKey(),
                'quantity' => $request->input('quantity'),
                'total' => $product->price
            ]);
            return redirect()->route('productos');
        } else {
            return redirect()->route('productosr');
        }
    }

    public function show(Product $product): View
    {
        $currency = config('app.currency');
        return view('admin.products.show', compact('product','currency'));
    }

    public function update(Request $request, Product $product)
    {
        $shoppingCartItem= auth()->user()->shoppingCartUser()->shoppingCartItems;
        $totalQuantity = $request->input('quantity');
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

    public function destroy($id): RedirectResponse
    {
        $itemShoppingCart = ShoppingCartItem::find($id);
        $itemShoppingCart->delete();
        return redirect()->route('shoppingCartUser');
    }
}

