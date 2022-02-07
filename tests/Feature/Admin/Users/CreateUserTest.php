<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=PermissionsSeeder');
    }

    public function test_it_can_access_to_the_creation_users_route(): void
    {
        $user = User::factory()->create()->givePermissionTo('create-user');
        $response = $this->actingAs($user)->get(route('users.create'));
        $response->assertStatus(200);
    }

    public function test_it_displays_a_user_creation_form(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-user');

        $response = $this->actingAs($user)->get(route('users.create'));

        $response->assertSee(trans('Name'));
        $response->assertSee(trans('Email'));
        $response->assertSee(trans('Password'));
        $response->assertSee(trans('Confirm password'));
        $response->assertSee(trans('Cancel'));
        $response->assertSee(trans('Create'));
    }
}