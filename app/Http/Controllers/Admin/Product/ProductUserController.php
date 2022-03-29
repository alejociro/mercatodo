<?php

namespace App\Http\Controllers\Admin\Product;

use App\Helpers\Filters\FilterProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class ProductUserController extends Controller
{
    public function filter(Request $request): View
    {
        $shoppingCart=auth()->user()->shoppingCartUser();
        $search = $request->input('query');
        $products = FilterProduct::filter($search)
                    ->whereNull('disabled_at')->paginate(6)->withQueryString();
        $currency = config('app.currency');
        return view('products.user', compact('products','currency','shoppingCart'));
    }
}
