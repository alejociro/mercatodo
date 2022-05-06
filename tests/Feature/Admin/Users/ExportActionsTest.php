<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ExportActionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_store_product_export()
    {
        Excel::fake();

        Permission::create(['name' => 'edit-user']);
        $user = User::factory()->create()->givePermissionTo('edit-user');
        $response = $this->actingAs($user)->get(route('admin.export.actions'));
        $response->assertOk();
        Excel::assertQueued('actions.xlsx', 'public');
    }
}
