<?php

namespace App\Http\Controllers;


use App\Actions\StoreUserAction;
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
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request, StoreUserAction $storeUserAction): RedirectResponse
    {
        $storeUserAction->execute($request->validated(), new User());
        return redirect()->route('users.index');
    }

    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit', compact('user','roles','userRole'));
    }

    public function update(UpdateUserRequest $request, $id): RedirectResponse
    {
        $input= $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index' );
    }
}

