<?php

namespace Tests\Feature\Admin\Actions;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChangeUserStatusTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=PermissionsSeeder');
    }

    public function test_it_can_change_user_status_to_disabled(): void
    {
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('edit-user');
        $response = $this->actingAs($user)->put(route('changeUserStatus',$user2->id));
        $response->assertRedirect();

        $user2 = $user2->refresh();
        $this->assertEquals($user2['disabled_at'], Carbon::now());
    }

    public function test_it_can_change_user_status_to_enabled(): void
    {
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('edit-user');
        $this->actingAs($user)->put(route('changeUserStatus',$user2->id));


        $response = $this->actingAs($user)->put(route('changeUserStatus',$user2->id));
        $response->assertRedirect();

        $user2 = $user2->refresh();
        $this->assertEquals($user2['disabled_at'], null);
    }
}