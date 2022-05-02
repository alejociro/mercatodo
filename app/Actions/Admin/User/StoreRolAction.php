<?php

namespace App\Actions\Admin\User;

use App\Events\ActionAdmin;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;

class StoreRolAction
{
    public function execute(string $name, array $permissions): void
    {
        $role = Role::create(['name'=>$name]);
        $role->syncPermissions($permissions);
        Cache::forget('roles');
        ActionAdmin::dispatch(auth()->user(), 'Creacion de rol');
    }
}
