<?php

namespace App\Http\Controllers;

use App\Helpers\Filters\FilterProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class ProductUserController extends Controller
{
    public function filter(Request $request): View
    {
        $search = $request->input('query');
        $products = FilterProduct::filter($search)
                    ->whereNull('disabled_at')->paginate(5);
        $currency = config('app.currency');
        return view('products.user', compact('products','currency'));
    }
}
