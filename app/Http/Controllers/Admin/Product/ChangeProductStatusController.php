<?php

namespace App\Http\Controllers\Admin\Product;

use App\Actions\Admin\Product\ChangeProductStatusAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ChangeProductStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-product|edit-product|delete-product', ['only'=>['update']]);
    }

    public function update(Product $product, ChangeProductStatusAction $changeProductStatusAction): RedirectResponse
    {
        $changeProductStatusAction->execute($product);
        return redirect()->route('products.index');
    }
}
