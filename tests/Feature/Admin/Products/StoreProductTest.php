<?php

namespace Tests\Feature\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Tests\TestCase;

class StoreProductTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=PermissionsSeeder');
    }

    public function test_it_stores_a_new_product(): void
    {
        $data= [
            'name' => 'Test product',
            'price' => 100,
            'stock' => 10,
            'description' => 'I am a test product',
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(50),
        ];
        $user = User::factory()->create()->givePermissionTo('create-product');
        $response = $this->actingAs($user)->post(route('admin.products.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }
}
