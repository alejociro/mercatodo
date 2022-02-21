<?php

namespace App\Http\Controllers\Admin\Product;

use App\Helpers\Filters\FilterProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:see-product|create-product|edit-product|delete-product', ['only' => ['index','show']]);
        $this->middleware('permission:create-product', ['only'=>['create','store']]);
        $this->middleware('permission:edit-product', ['only'=>['edit','update']]);
        $this->middleware('permission:delete-product',['only'=>['destroy']]);
    }

    public function index(Request $request): View
    {
        $search = $request->input('query');
        $products = FilterProduct::filter($search)->select(['id','name','price','stock','category_id','disabled_at'])->paginate(5)->withQueryString();
        $currency = config('app.currency');
        return view('admin.products.index', compact('products','currency'));
    }

    public function create(): View
    {
        $categories = Category::get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->all();
        if($image = $request->file('image')) {
            $routeSaveImg = 'image/';
            $imageProduct = date('YmdHis'). "." . $image->getClientOriginalExtension();
            $image->move($routeSaveImg, $imageProduct);
            $data['image'] = "$imageProduct";
        }

        Product::create($data);
        return redirect()->route('products.index');
    }

    public function show(Product $product): View
    {
        $currency = config('app.currency');
        return view('admin.products.show', compact('product','currency'));
    }

    public function edit(Product $product): View
    {
        $categories = Category::get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateUserRequest $request, Product $product): RedirectResponse
    {
        $prod = $request->all();
        if($image = $request->file('image')){
            $routeSaveImg = 'image/';
            $imageProduct = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($routeSaveImg, $imageProduct);
            $prod['image'] = "$imageProduct";
        }else{
            unset($prod['image']);
        }
        $product->update($prod);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}