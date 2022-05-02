<?php

namespace App\Imports;

use App\Models\Product;
use App\Rules\Product\import;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation, WithUpserts
{
    public function model(array $row)
    {
        return new Product([
            'name'     => $row['name'],
            'price'    => $row['price'],
            'stock' => $row['stock'],
            'description' => $row['description'],
            'category_id' => $row['category_id'],
            'disabled_at' => $row['disabled_at'],
        ]);
    }

    public function rules(): array
    {
        return import::rules();
    }

    public function uniqueBy()
    {
        return 'name';
    }
}
