<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:see-product', ['only'=>['reportProductSold']]);
    }

    public function reportProductsSold()
    {
        return view('admin.products.solds');
    }
}
