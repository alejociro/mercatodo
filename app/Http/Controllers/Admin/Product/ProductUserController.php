<?php

namespace App\Http\Controllers\Admin\Product;

use App\Actions\Admin\Product\CategoryInCacheAction;
use App\Helpers\Filters\FilterProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class ProductUserController extends Controller
{
    public function filter(Request $request, CategoryInCacheAction $categoryInCacheAction): View
    {
        $shoppingCart=auth()->user()->shoppingCartUser();
        $categories = $categoryInCacheAction->categoriesCache();
        $products = FilterProduct::filter($request->input('query'), $request->query('category_id'))
                    ->whereNull('disabled_at')->paginate(6)->withQueryString();
        $currency = config('app.currency');

        return view('products.user', compact('products', 'currency', 'shoppingCart', 'categories'));
    }
}
