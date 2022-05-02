<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActionsController extends Controller
{
    public function index(): View
    {
        $actions = Action::orderby('created_at')->paginate(20);
        return view('admin.users.actions.actions', compact('actions'));
    }
}
