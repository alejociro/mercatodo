<?php

namespace Tests\Feature\Admin\Products\Categories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class DeleteCategoryTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_can_delete_category(): void
    {
        Permission::create(['name' => 'delete-category']);
        $category = Category::factory()->create();
        $user = User::factory()->create()->givePermissionTo('delete-category');
        $response = $this->actingAs($user)->delete("/categories/{$category->getRouteKey()}");
        $response->assertRedirect();
    }
}
