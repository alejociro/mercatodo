<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:see-user|create-user|edit-user|delete-user', ['only'=>['index']]);
    }

    public function index(): View
    {
        $payments = Payment::paginate(20);
        return view('admin.users.payment', compact('payments'));
    }
}
