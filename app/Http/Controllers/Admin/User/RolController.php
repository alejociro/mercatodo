<?php

namespace App\Http\Controllers\Admin\User;

use App\Actions\Admin\User\EditRolAction;
use App\Actions\Admin\User\StoreRolAction;
use App\Actions\Admin\User\UpdateRolAction;
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

    public function store(StoreRolRequest $request, StoreRolAction $storeRolAction): RedirectResponse
    {
        $storeRolAction->execute($request->input('name'), $request->input('permission'));
        return redirect()->route('admin.roles.index');
    }

    public function edit($id, EditRolAction $editRolAction): View
    {
        $arr = $editRolAction->execute($id);
        return view('admin.roles.edit', compact('arr'));
    }

    public function update(UpdateRolRequest $request, Role $role,UpdateRolAction $updateRolAction): RedirectResponse
    {
        $updateRolAction->execute($role,$request->input('name'), $request->input('permission'));
        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
        Cache::forget('roles');
        return redirect()->route('admin.roles.index');
    }
}
