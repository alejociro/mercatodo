<?php

namespace App\Http\Controllers\Admin\Product;

use App\Actions\Admin\DeleteModelAction;
use App\Actions\Admin\Product\StoreProductAction;
use App\Actions\Admin\Product\UpdateProductAction;
use App\Actions\Admin\StoreOrUpdateImage;
use App\Helpers\Filters\FilterProduct;
use App\Helpers\Products\StoreFormatImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:see-product|create-product|edit-product|delete-product', ['only' => ['index','show']]);
        $this->middleware('permission:create-product', ['only'=>['create','store']]);
        $this->middleware('permission:edit-product', ['only'=>['edit','update']]);
        $this->middleware('permission:delete-product', ['only'=>['destroy']]);
    }

    public function index(Request $request): View
    {
        $products = FilterProduct::filter($request->input('query'))->select(['id','name','price','stock','category_id','disabled_at'])->paginate(5)->withQueryString();
        $currency = config('app.currency');
        return view('admin.products.index', compact('products', 'currency'));
    }

    public function create(): View
    {
        $categories = Category::get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request, StoreProductAction $storeProductAction, StoreFormatImage $formatImage): RedirectResponse
    {
        $storeProductAction->execute($request->validated(), new Product(), $formatImage->saveImage($request->file('image')), $request['category_id']);
        return redirect()->route('admin.products.index');
    }

    public function show(Product $product): View
    {
        $currency = config('app.currency');
        return view('admin.products.show', compact('product', 'currency'));
    }

    public function edit(Product $product): View
    {
        $categories = Category::get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $updateProductAction, StoreOrUpdateImage $updateImage): RedirectResponse
    {
        $updateImage->updateImage($request->file('image'), $product);
        $updateProductAction->execute($request->validated(), $product, $request['category_id']);
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product, DeleteModelAction $deleteModelAction): RedirectResponse
    {
        $deleteModelAction->execute($product);
        return redirect()->route('admin.products.index');
    }
}
