<?php

use App\Http\Controllers\Admin\Product\ProductUserController;
use App\Http\Controllers\User\Purchase\PaymentController;
use App\Http\Controllers\User\Purchase\ShoppingCartController;
use App\Http\Controllers\User\Purchase\ShoppingCartItemController;
use App\Http\Controllers\User\Purchase\TryPaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth','check_Status']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })
        ->name('dashboard');
    Route::get('productos', [ProductUserController::class, 'filter'])
        ->name('productos');
    Route::get('shoppingCartUser', [ShoppingCartController::class, 'index'])
        ->name('shoppingCartUser');
    Route::post('/trypayment/{payment}', [TryPaymentController::class, 'store'])
        ->name('trypayment');
    Route::resource('shoppingCartItems', ShoppingCartItemController::class);
    Route::post('/shopping-carts/{shoppingCart}/create/{product}', [ShoppingCartItemController::class, 'store'])
        ->name('shoppingCarts.items.store');
    Route::post('/shopping-carts/update/{product}', [ShoppingCartItemController::class, 'update'])
        ->name('shoppingCarts.items.update');
    Route::resource('payments', PaymentController::class);
});

require __DIR__.'/auth.php';

Route::get('/app', function () {
    return view('app');
});
