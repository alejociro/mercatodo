<?php

namespace App\Http\Controllers\Admin\User;

use App\Actions\Admin\User\ChangeUserStatusAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChangeUserStatusController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:create-user|edit-user|delete-user', ['only'=>['update']]);
    }

    public function update(User $user, ChangeUserStatusAction $changeUserStatusAction): RedirectResponse
    {
        $changeUserStatusAction->execute($user);
        return redirect()->route('admin.users.index');
    }
}
