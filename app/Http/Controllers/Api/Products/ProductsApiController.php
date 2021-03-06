<?php

namespace App\Http\Controllers\Api\Products;

use App\Actions\Admin\Api\StoreProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;
use App\Http\Resources\Api\ProductsResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductsApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProductsResource::collection(Product::paginate());
    }

    public function store(StoreProductRequest $request, StoreProductAction $storeProductAction): JsonResponse
    {
        $product = $storeProductAction->execute($request->all(), new Product());
        return ProductsResource::make($product)->response()->setStatusCode(201);
    }

    public function show(Product $product): ProductsResource
    {
        return ProductsResource::make($product);
    }

    public function update(UpdateProductRequest $request, $id): ProductsResource
    {
        $product = Product::find($id);
        $product->update($request->all());
        return ProductsResource::make($product);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json(['status' => '201', 'message' => 'se ha eliminado correctamente el producto que has elegido']);
    }
}
