<?php

namespace App\Models;

use App\Helpers\MoneyFormatHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
    ];

    public function shoppingCartItems(): HasMany
    {
        return $this->hasMany(ShoppingCartItem::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    protected $appends = [
        'total_format'
    ];

    public function getTotalFormatAttribute()
    {
        return MoneyFormatHelper::convert($this->total);
    }
}
