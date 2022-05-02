<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Action;
use Illuminate\Http\Request;

class ActionsController extends Controller
{
    public function index()
    {
        $actions = Action::orderby('user_id')->paginate(20);
        return view('admin.users.actions.actions', compact('actions'));
    }
}
