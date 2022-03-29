<?php

namespace App\Models;

use App\Helpers\MoneyFormatHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'receipt',
        'payer_document',
        'payer_ip',
        'description',
        'amount',
        'status',
        'paid_at',
        'process_url',
        'request_id',
        'user_id',
        'shopping_cart_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shoppingCart(): HasOne
    {
        return $this->hasOne(ShoppingCart::class);
    }

    protected $appends = [
        'amount_format'
    ];

    public function getAmountFormatAttribute()
    {
        return MoneyFormatHelper::convert($this->amount);
    }
}
