<?php

use App\Http\Controllers\ChangeUserStatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
});

Route::put('/chageStatus/{user}',[ChangeUserStatusController::class, 'update'])->name('changeUserStatus');

Route::get('/disabled', function (){
    return 'Su cuenta esta desabilitada';
})->name('disabled');
