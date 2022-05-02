<?php

namespace Tests\Feature\Admin\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ImportProductTest extends TestCase
{
    use RefreshDatabase;

    public function testThatItImportsTheUploadedFile()
    {
        Permission::create(['name' => 'create-product']);
        $user = User::factory()->create()->givePermissionTo('create-product');

        $file = new UploadedFile(
            base_path('tests/files/product-import.xlsx'),
            'product-import.xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            null,
            true
        );

        Excel::fake();
        $response = $this->actingAs($user)->post(route('admin.import.products'), [
            'file' => $file
        ]);
        $response->assertRedirect();
        Excel::assertQueued('product-import.xlsx');
    }
}
