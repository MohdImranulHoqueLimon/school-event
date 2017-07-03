<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PaymentsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentsService $paymentsService)
    {
        $this->paymentService = $paymentsService;
    }

    public function showInvoice($id)
    {
        $paymentInfo = $this->paymentService->find($id);
        return view('admin.invoice.index', compact('paymentInfo'));
    }
}