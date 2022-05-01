<?php

namespace App\Actions\Admin\User;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRolAction
{
    public function execute($id): array
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id',$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return [
            'role' => $role,
            'permissions' => $permission,
            'rolePermissions' => $rolePermissions
        ];;
    }
}
