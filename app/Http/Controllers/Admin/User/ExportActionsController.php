<?php

namespace App\Http\Controllers\Admin\User;

use App\Exports\ActionsExport;
use App\Http\Controllers\Controller;
use App\Jobs\NotifyUserActionsExportReady;
use App\Jobs\NotifyUserOfCompletedExport;
use App\Models\Action;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ExportActionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-user|edit-user|delete-user', ['only'=>['form','export']]);
    }

    public function form(): View
    {
        return view('admin.users.actions.export');
    }

    public function export(Request $request): View
    {
        $userConsult = User::select('id')->where('document', $request->query('user_id'))->first();
        $user =auth()->user();
        $filepath = asset('storage/actions.xlsx');
        Excel::store((new ActionsExport())
            ->forUser($userConsult->id), 'actions.xlsx', 'public')
            ->chain([new NotifyUserActionsExportReady($user, $filepath)]);
        $actions = Action::orderby('created_at')->paginate(20);
        return view('admin.users.actions.actions', compact('actions'));
    }
}
