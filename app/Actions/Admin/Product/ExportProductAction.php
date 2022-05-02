<?php

namespace App\Actions\Admin\Product;

use App\Events\ActionAdmin;
use App\Exports\ProductsExport;
use App\Jobs\NotifyUserOfCompletedExport;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;

class ExportProductAction
{
    public function execute(array $stock, array $prices, ?string $category)
    {
        $user = auth()->user();
        $filepath = asset('storage/products.xlsx');
        $categories = Category::all();

        Excel::store((new ProductsExport())
            ->forStock($stock)
            ->forPrices($prices)
            ->forCategory($category), 'products.xlsx', 'public')
            ->chain([new NotifyUserOfCompletedExport($user, $filepath)]);
        ActionAdmin::dispatch(auth()->user(), 'Exporte de productos');
        return $categories;
    }
}
