<?php

namespace App\Actions\Admin\User;

use App\Exports\ActionsExport;
use App\Jobs\NotifyUserActionsExportReady;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class ExportActionsAction
{
    public function execute(?string $document)
    {
        $userConsult = User::select('id')->where('document', $document)->first();
        $user =auth()->user();
        $filepath = asset('storage/actions.xlsx');
        if ($userConsult) {
            Excel::store((new ActionsExport())
            ->forUser($userConsult->id), 'actions.xlsx', 'public')
            ->chain([new NotifyUserActionsExportReady($user, $filepath)]);
        } else {
            Excel::store((new ActionsExport())
            ->forUser(), 'actions.xlsx', 'public')
            ->chain([new NotifyUserActionsExportReady($user, $filepath)]);
        }
    }
}
