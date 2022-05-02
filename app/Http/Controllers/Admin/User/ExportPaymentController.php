<?php

namespace App\Http\Controllers\Admin\User;

use App\Events\ActionAdmin;
use App\Exports\PaymentsExport;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-user|edit-user|delete-user', ['only'=>['paymentFormExport','export']]);
    }

    public function paymentFormExport(): View
    {
        $fechaNow = Carbon::now()->format('Y-m-d');
        return view('admin.users.exportPayments', compact('fechaNow'));
    }

    public function export(Request $request): BinaryFileResponse
    {
        ActionAdmin::dispatch(auth()->user(), 'Exporte de pagos');
        return Excel::download((new PaymentsExport())
            ->forStatus($request->query('status'))->forDates($request->query('dates')), 'payments.xlsx');
    }
}
