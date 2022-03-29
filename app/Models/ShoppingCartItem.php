<?php

namespace App\Models;

use App\Helpers\MoneyFormatHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShoppingCartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'total'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

     protected $appends = [
        'total_format'
    ];

    public function getTotalFormatAttribute()
    {
        return MoneyFormatHelper::convert($this->total);
    }

}
