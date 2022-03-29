<?php

use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\User\ChangeUserStatusController;
use App\Http\Controllers\Admin\Product\ChangeProductStatusController;
use App\Http\Controllers\Admin\Product\ProductUserController;
use App\Http\Controllers\Admin\User\PaymentAdminController;
use App\Http\Controllers\User\Purchase\PaymentController;
use App\Http\Controllers\User\Purchase\ShoppingCartController;
use App\Http\Controllers\User\Purchase\ShoppingCartItemController;
use App\Http\Controllers\User\Purchase\TryPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\RolController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Product\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','check_Status'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware'=>['auth','check_Status']],function (){
    Route::resource('roles',RolController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('productos',[ProductUserController::class, 'filter'])->name('productos');
    Route::get('shoppingCartUser', [ShoppingCartController::class, 'index'])->name('shoppingCartUser');
    Route::resource('shoppingCartItems', ShoppingCartItemController::class);
    Route::resource('payments', PaymentController::class);
    Route::post('/trypayment/{payment}', [TryPaymentController::class, 'store'])
    ->name('trypayment');
    Route::get('paymentAdmin', [PaymentAdminController::class, 'index'])->name('paymentAdmin');
});




Route::post('/shopping-carts/{shoppingCart}/create/{product}', [ShoppingCartItemController::class, 'store'])
    ->name('shoppingCarts.items.store');

Route::post('/shopping-carts/update/{product}', [ShoppingCartItemController::class, 'update'])
    ->name('shoppingCarts.items.update');

Route::put('/chageStatus/{user}',[ChangeUserStatusController::class, 'update'])->name('changeUserStatus');
Route::put('/chageProductStatus/{product}',[ChangeProductStatusController::class, 'update'])->name('changeProductStatus');

Route::get('/app', function () {
    return view('app');
});




