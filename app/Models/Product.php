<?php

namespace App\Models;

use App\Helpers\MoneyFormatHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image',
        'stock',
        'description',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected $appends = [
        'price_format'
    ];

    public function getPriceFormatAttribute()
    {
        return MoneyFormatHelper::convert($this->price);
    }
}
