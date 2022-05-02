<?php

namespace App\Http\Controllers\Admin\User;

use App\Exports\ActionsExport;
use App\Http\Controllers\Controller;
use App\Jobs\NotifyUserOfCompletedExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportActionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-user|edit-user|delete-user', ['only'=>['form','export']]);
    }

    public function form()
    {
        return view('admin.users.actions.export');
    }

    public function export(Request $request)
    {
        $user =auth()->user();
        $filepath = asset('storage/actions.xlsx');
        Excel::store((new ActionsExport())
            ->forUser($request->query('user_id')), 'actions.xlsx', 'public')
            ->chain([new NotifyUserOfCompletedExport($user, $filepath)]);

        return view('admin.users.actions.export');
    }
}
