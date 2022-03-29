<?php

namespace App\Http\Controllers\Admin\User;

use App\Actions\Admin\User\StoreUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:see-user|create-user|edit-user|delete-user', ['only' => ['index']]);
        $this->middleware('permission:create-user', ['only'=>['create','store']]);
        $this->middleware('permission:edit-user', ['only'=>['edit','update']]);
        $this->middleware('permission:delete-user',['only'=>['destroy']]);
    }

    public function index(): View
    {
        $users = User::orderby('name')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request, StoreUserAction $storeUserAction): RedirectResponse
    {
        $storeUserAction->execute($request->validated(), new User());
        return redirect()->route('users.index');
    }

    public function edit(User $user): View
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.users.edit', compact('user','roles','userRole'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $input= $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index' );
    }
}

