<?php

use App\Http\Controllers\ChangeUserStatusController;
use App\Http\Controllers\ChangeProductStatusController;
use App\Http\Controllers\ProductUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified','check_Status'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware'=>['auth','verified','check_Status']],function (){
    Route::resource('roles',RolController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::get('productos',[ProductUserController::class, 'filter'])->name('productos');
});

Route::put('/chageStatus/{user}',[ChangeUserStatusController::class, 'update'])->name('changeUserStatus');
Route::put('/chageProductStatus/{product}',[ChangeProductStatusController::class, 'update'])->name('changeProductStatus');




