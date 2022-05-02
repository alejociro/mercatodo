<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Carbon;

class ChangeProductStatusAction
{
    public function execute(Product $product): void
    {
        if ($product->disabled_at == null) {
            $product->disabled_at = Carbon::now();
        } else {
            $product->disabled_at = null;
        }
        $product->save();
    }
}
