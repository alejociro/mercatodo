<?php

namespace App\Helpers;

class MoneyFormatHelper
{
    public static function convert(?string $amount): string
    {
        return '$' . ($amount ? number_format($amount, 0, ',', '.') : '0');
    }
}
