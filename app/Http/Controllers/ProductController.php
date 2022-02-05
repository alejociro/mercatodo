<?php

namespace App\Http\Controllers;

use App\Helpers\Filters\FilterProduct;
use App\Http\Requests\Products\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:see-product|create-product|edit-product|delete-product', ['only' => ['index']]);
        $this->middleware('permission:create-product', ['only'=>['create','store']]);
        $this->middleware('permission:edit-product', ['only'=>['edit','update']]);
        $this->middleware('permission:delete-product',['only'=>['destroy']]);
    }

    public function index(Request $request): View
    {
        $search = $request->input('query');
        $products = FilterProduct::filter($search)->select(['id','name','price','stock','disabled_at'])->paginate(5);
        $currency = config('app.currency');
        return view('products.index', compact('products','currency'));
    }

    public function create(): View
    {
        return view('products.create');
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
        return view('products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);

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
