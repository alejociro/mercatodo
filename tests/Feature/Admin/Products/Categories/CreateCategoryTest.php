<?php

namespace Tests\Feature\Admin\Products\Categories;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_can_access_to_the_creation_category_route(): void
    {
        Permission::create(['name' => 'create-category']);
        $user = User::factory()->create()->givePermissionTo('create-category');
        $response = $this->actingAs($user)->get(route('categories.create'));
        $response->assertStatus(200);
    }
}
