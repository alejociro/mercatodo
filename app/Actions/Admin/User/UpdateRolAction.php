<?php

namespace App\Actions\Admin\User;

use App\Events\ActionAdmin;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;

class UpdateRolAction
{
    public function execute(Role $role, $name, $permissions):void
    {
        $role->name = $name;
        $role->save();
        $role->syncPermissions($permissions);
        Cache::forget('roles');
        ActionAdmin::dispatch(auth()->user(), 'Edito un Rol');
    }
}
