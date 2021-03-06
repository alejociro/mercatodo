<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductSoldEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public Product $product;
    public string $name;

    public function __construct($product, $name)
    {
        $this->product = $product;
        $this->name = $name;
    }
}
