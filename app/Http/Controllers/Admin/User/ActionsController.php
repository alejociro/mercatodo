<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-user|edit-user|delete-user', ['only'=>['update']]);
    }

    public function index(): View
    {
        $actions = Action::orderby('created_at')->paginate(20);
        return view('admin.users.actions.actions', compact('actions'));
    }
}
