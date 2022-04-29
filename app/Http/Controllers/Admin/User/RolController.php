<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\StoreRolRequest;
use App\Http\Requests\Admin\Roles\UpdateRolRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:see-rol|create-rol|edit-rol|delete-rol', ['only'=>['index']]);
        $this->middleware('permission:create-rol', ['only'=>['create','store']]);
        $this->middleware('permission:edit-rol', ['only'=>['edit','update']]);
        $this->middleware('permission:delete-rol',['only'=>['destroy']]);
    }

    public function index(): View
    {
        $roles = Cache::rememberForever('roles', function (){
            return Role::paginate(5);
        });

        return view('admin.roles.index', compact('roles'));
    }

    public function create(): View
    {
        $permission = Permission::get();
        return view('admin.roles.create', compact('permission'));
    }

    public function store(StoreRolRequest $request): RedirectResponse
    {
        $role = Role::create(['name'=>$request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.roles.index');
    }

    public function edit($id): View
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id',$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit', compact('role','permission','rolePermissions'));
    }

    public function update(UpdateRolRequest $request, Role $role): RedirectResponse
    {
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.roles.index');
    }

    public function destroy($id): RedirectResponse
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('admin.roles.index');
    }
}
