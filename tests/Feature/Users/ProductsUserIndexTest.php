<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsUserIndexTest extends TestCase
{
    public function test_it_can_list_users_products(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('productos'));
        $response->assertStatus(200);
        $response->assertViewIs('products.user');
        $response->assertViewHas('products');
    }
}
