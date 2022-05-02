<?php

namespace App\Http\Controllers\Admin\Product;

use App\Actions\Admin\Product\CategoryInCacheAction;
use App\Actions\Admin\Product\ExportProductAction;
use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Jobs\NotifyUserOfCompletedExport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ExportProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:see-product', ['only'=>['productFormExport','export']]);
    }

    public function productFormExport(CategoryInCacheAction $action): View
    {
        $categories = $action->categoriesCache();
        return view('admin.products.export', compact('categories'));
    }

    public function export(Request $request, ExportProductAction $exportProductAction, CategoryInCacheAction $categoryInCacheAction): View
    {
        $categories = $exportProductAction->execute($request->query('stock'), $request->query('prices'), $request->query('category'), $categoryInCacheAction);
        return view('admin.products.export', compact('categories'));
    }
}
