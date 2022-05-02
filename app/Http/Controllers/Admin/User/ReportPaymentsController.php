<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportPaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:see-user', ['only'=>['show']]);
    }

    public function show()
    {
        return view('admin.users.paymentsChart');
    }
}
