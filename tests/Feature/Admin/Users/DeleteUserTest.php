<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=PermissionsSeeder');
    }
    public function test_it_can_delete_users(): void
    {
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('delete-user');
        $response = $this->actingAs($user)->delete("/users/{$user2->id}");
        $response->assertRedirect();
    }
}
