<?php

use App\Http\Controllers\Api\Products\MetricsController;
use App\Http\Controllers\Api\Products\ProductsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('productsapi', ProductsApiController::class);
Route::get('productMetric', [MetricsController::class , 'chart']);
Route::get('metricPayments', [MetricsController::class, 'barChart']);
