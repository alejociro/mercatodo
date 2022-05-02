<?php

namespace App\Listeners;



use App\Events\ProductSoldEvent;
use App\Models\ProductSold;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddProductSold
{
    public function handle(ProductSoldEvent $event): void
    {
        ProductSold::create([
            'product_id' => $event->product->getRouteKey(),
            'name' => $event->name,
        ]);
    }
}
