<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\PaymentsService;
use Elibyy\TCPDF\Facades\TCPDF;
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

    public function show($id)
    {
        $paymentInfo = $this->paymentService->find($id);
        return view('user.invoice.show', compact('paymentInfo'));
    }

    public function downloadInvoice($id) {

        $invoiceHtml = $this->paymentService->getInvoiceHtml($id);

        TCPDF::SetTitle('Invoice');
        TCPDF::AddPage();
        TCPDF::WriteHTML($invoiceHtml);
        TCPDF::Output('Invoice.pdf');
    }
}