<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements WithHeadings, FromQuery, ShouldQueue
{
    private ?array $stock;
    private ?array $prices;
    private ?string $category;

    public function forStock($array)
    {
        $this->stock = $array;

        return $this;
    }

    public function forPrices($array)
    {
        $this->prices = $array;

        return $this;
    }

    public function forCategory(string $category = null)
    {
        $this->category = $category;

        return $this;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Price',
            'Stock',
            'Description',
            'Category_id',
            'Disabled_at',
        ];
    }

    public function query()
    {
        return Product::query()->when($this->prices, function ($query) {
            $query->WhereBetween('price', [$this->prices['initial'], $this->prices['end']]);
        })->when($this->stock['end'], function ($query) {
            $query->WhereBetween('stock', [$this->stock['initial'], $this->stock['end']]);
        })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })->
            select('name', 'price', 'stock', 'description', 'category_id', 'disabled_at');
    }
}
