<?php

namespace Tests\Feature\Admin\Products;

use App\Exports\ProductsExport;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ExportProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_store_product_export()
    {
        Excel::fake();

        Permission::create(['name' => 'see-product']);
        $user = User::factory()->create()->givePermissionTo('see-product');
        $this->actingAs($user)->get('/products/store/xlsx');

        Excel::assertStored('products.xlsx', function(ProductsExport $export) {
        return true;
    });
    }

    public function test_it_can_download_payments_export()
    {
        Excel::fake();

        Permission::create(['name' => 'see-product']);
        $user = User::factory()->create()->givePermissionTo('see-product');
        $this->actingAs($user)->get('/admin/export/products');

        Excel::assertStored('products.xlsx', 'public');
    }
}
