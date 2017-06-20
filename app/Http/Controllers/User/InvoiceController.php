<?php

namespace App\Http\Controllers\User;

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

    public function index()
    {
        $userId = Auth::user()->id;
        $payments = $this->paymentService->getPaymentsByUser($userId);

        return View('user.invoice.index', compact('payments'));
    }
}