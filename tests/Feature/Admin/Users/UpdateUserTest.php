<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=PermissionsSeeder');
    }

    public function test_it_can_update_a_user(): void
    {
        $request = [
            'name' => 'alejandro',
        ];
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('edit-user');

        $response = $this->actingAs($user)->patch(route('admin.users.update', $user2->id), $request);
        $response->assertRedirect();

        $user2 = $user2->refresh();
        $this->assertEquals($request['name'], $user2->name);
    }

    public function test_it_can_update_a_user_with_password(): void
    {
        $request = [
            'name' => 'alejandro',
            'password' => '12345678',
            'confirm-password' => '12345678' ,
        ];
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('edit-user');

        $response = $this->actingAs($user)->patch(route('admin.users.update', $user2->id), $request);
        $response->assertRedirect();

        $user2 = $user2->refresh();
        $this->assertEquals($request['name'], $user2->name);
    }
}
