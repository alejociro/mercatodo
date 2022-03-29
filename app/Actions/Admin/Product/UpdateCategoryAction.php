<?php

namespace App\Actions\Admin\Product;

class UpdateCategoryAction
{
    public function execute(array $data, Product $product): Product
    {
        return parent::execute($data, $product);
    }
}
