<?php

namespace App\Http\Controllers\Admin;

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

    public function showInvoice($id)
    {
        $id = base64_decode($id);
        $paymentInfo = $this->paymentService->find($id);
        return view('admin.invoice.index', compact('paymentInfo'));
    }

    public function downloadInvoice($id) {

         $id = base64_decode($id);
        $invoiceHtml = $this->paymentService->getInvoiceHtml($id);

        TCPDF::SetTitle('Invoice');
        TCPDF::AddPage();
        TCPDF::WriteHTML($invoiceHtml);
        TCPDF::Output('hello_world.pdf');
    }
}