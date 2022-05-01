<?php

namespace App\Actions\Admin\Product;

use Illuminate\Support\Facades\Cache;

class DeleteCategoryCache
{
    public function execute(): void
    {
        Cache::forget('categories');
    }
}
