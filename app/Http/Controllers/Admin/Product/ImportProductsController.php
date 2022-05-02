<?php

namespace App\Http\Controllers\Admin\Product;

use App\Actions\Admin\Product\ImportProductAction;
use App\Events\UploadFileImportProducts;
use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ImportProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-product|edit-product|delete-product', ['only'=>['productFormImport','import']]);
    }

    public function productFormImport(): View
    {
        return view('admin.products.import');
    }

    public function import(Request $request, ImportProductAction $importProductAction): RedirectResponse
    {
        $importProductAction->execute($request->file('file'));
        return redirect()->route('admin.products.index');
    }
}
