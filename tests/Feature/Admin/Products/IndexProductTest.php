<?php

namespace Tests\Feature\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexProductTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=PermissionsSeeder');
    }

    public function test_it_can_list_products(): void
    {
        $user = User::factory()->create()->givePermissionTo('see-product');
        $response = $this->actingAs($user)->get(route('admin.products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.products.index');
        $response->assertViewHas('products');
    }

    public function test_it_user_doesnt_permissions_cant_list_products(): void
    {
        $user2 = User::factory()->create();
        $response = $this->actingAs($user2)->get(route('admin.products.index'));
        $response->assertForbidden();
    }
}
