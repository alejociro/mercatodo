<?php

use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ChangeProductStatusController;
use App\Http\Controllers\Admin\Product\ExportProductController;
use App\Http\Controllers\Admin\Product\ImportProductsController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ReportProductController;
use App\Http\Controllers\Admin\User\ActionsController;
use App\Http\Controllers\Admin\User\ChangeUserStatusController;
use App\Http\Controllers\Admin\User\ExportActionsController;
use App\Http\Controllers\Admin\User\ExportPaymentController;
use App\Http\Controllers\Admin\User\PaymentAdminController;
use App\Http\Controllers\Admin\User\ReportPaymentsController;
use App\Http\Controllers\Admin\User\RolController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['auth','check_Status']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('paymentAdmin', [PaymentAdminController::class, 'index'])
        ->name('payment');
    Route::resource('products', ProductController::class);
    Route::put('changeStatus/{user}', [ChangeUserStatusController::class, 'update'])
        ->name('change.user.status');
    Route::put('changeProductStatus/{product}', [ChangeProductStatusController::class, 'update'])
        ->name('change.product.status');
    Route::get('export/products', [ExportProductController::class, 'export'])
        ->name('export.products');
    Route::get('export/products/form', [ExportProductController::class, 'productFormExport'])
        ->name('export.products.form');
    Route::get('export/payments', [ExportPaymentController::class, 'export'])
        ->name('export.payments');
    Route::get('export/payments/form', [ExportPaymentController::class, 'paymentFormExport'])
        ->name('export.payments.form');
    Route::get('import/products/form', [ImportProductsController::class, 'productFormImport'])
        ->name('import.products.form');
    Route::post('import/products', [ImportProductsController::class, 'import'])
        ->name('import.products');
    Route::get('report/products', [ReportProductController::class, 'reportProductsSold'])
        ->name('report.products');
    Route::get('report/payments', [ReportPaymentsController::class, 'show'])
        ->name('report.payments');
    Route::get('actions', [ActionsController::class, 'index'])
        ->name('actions');
    Route::get('export/actions/form', [ExportActionsController::class, 'form'])
        ->name('export.actions.form');
    Route::get('export/actions', [ExportActionsController::class, 'export'])
        ->name('export.actions');
});
