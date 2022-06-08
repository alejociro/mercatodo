<?php

namespace App\Http\Controllers\Admin\User;

use App\Actions\Admin\User\ExportActionsAction;
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

    public function export(Request $request, ExportActionsAction $exportActionsAction): View
    {
        $exportActionsAction->execute($request->query('user_id'));
        $actions = Action::orderby('created_at')->paginate(20);
        return view('admin.users.actions.actions', compact('actions'));
    }
}
