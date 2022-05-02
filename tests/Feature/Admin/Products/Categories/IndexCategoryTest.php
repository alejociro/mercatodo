<?php

namespace Tests\Feature\Admin\Products\Categories;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class IndexCategoryTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_can_list_categories(): void
    {
        Permission::create(['name' => 'see-category']);
        $user = User::factory()->create()->givePermissionTo('see-category');
        $response = $this->actingAs($user)->get(route('categories.index'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.category.index');
        $response->assertViewHas('categories');
    }
}
