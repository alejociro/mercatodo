<?php

namespace App\Actions\Admin\Product;

use App\Models\Category;

class StoreCategoryAction
{
    public function execute(array $data, Category $category): Category
    {
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->save();

        return $category;
    }
}
