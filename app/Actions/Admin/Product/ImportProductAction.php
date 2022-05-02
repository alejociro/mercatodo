<?php

namespace App\Actions\Admin\Product;

use App\Events\ActionAdmin;
use App\Events\UploadFileImportProducts;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportProductAction
{
    public function execute($file): void
    {
        try {
            Excel::import(new ProductsImport(), $file);
            UploadFileImportProducts::dispatch('Upload successful', auth()->user());
            ActionAdmin::dispatch(auth()->user(), 'Importe de productos');
        } catch (\Throwable $exception) {
            UploadFileImportProducts::dispatch('Error in the proccess of upload file', auth()->user());
        }
    }
}
