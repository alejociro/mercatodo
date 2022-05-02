<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\ProductSold;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class MetricsController extends Controller
{
    public function chart(): JsonResponse
    {
        $values = ProductSold::select('name', DB::raw('count(*) as total'))->groupBy('name')
            ->get()
            ->toArray();

        return response()->json([
            'data' => Arr::pluck($values, 'total', 'name')
        ]);
    }

    public function barChart(): JsonResponse
    {
        $values = Payment::select('status', DB::raw('count(*) as total'))->groupBy('status')
            ->get()
            ->toArray();

        return response()->json([
            'data' => Arr::pluck($values, 'total', 'status')
        ]);
    }
}
