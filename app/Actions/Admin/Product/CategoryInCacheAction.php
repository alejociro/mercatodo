<?php

namespace App\Actions\Admin\Product;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryInCacheAction
{
    public function categoriesCache()
    {
        return Cache::rememberForever('categories', function () {
            return Category::orderBy('name')->get();
        });
    }
}
