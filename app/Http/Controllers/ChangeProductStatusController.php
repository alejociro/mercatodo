<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ChangeProductStatusController extends Controller
{
    public function update($id): RedirectResponse
    {
        $product = Product::find($id);
        if($product->disabled_at == null){
            $product->disabled_at = Carbon::now();
        }else{
            $product->disabled_at = null;
        }
        $product->save();
        return redirect()->route('products.index');
    }
}
