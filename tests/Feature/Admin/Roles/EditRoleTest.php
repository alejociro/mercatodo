<?php

namespace Tests\Feature\Admin\Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class EditRoleTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=PermissionsSeeder');
    }
    public function test_it_can_edit_roles(): void
    {
        $role = Role::create(['name' => 'writer']);
        $permission = Permission::create(['name' => 'edit articles']);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $user = User::factory()->create()->givePermissionTo('edit-rol');

        $response = $this->actingAs($user)->get("/admin/roles/{$role->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('admin.roles.edit');
        $response->assertViewHas('role');
    }
}
