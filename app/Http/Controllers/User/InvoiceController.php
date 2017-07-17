<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\EventsService;
use App\Services\PaymentsService;
use App\Services\PaymentTypesService;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    protected $paymentService;
    protected $eventService;
    protected $paymentTypesService;

    public function __construct(
        PaymentsService $paymentsService, EventsService $eventsService, PaymentTypesService $paymentTypesService
    ) {
        $this->paymentService = $paymentsService;
        $this->eventService = $eventsService;
        $this->paymentTypesService = $paymentTypesService;
    }

    public function index(Request $request)
    {
        $filters = $request->all();
        $userId = Auth::user()->id;
        $events = $this->eventService->getAllActiveEvents();
        $payments = $this->paymentService->getPaymentsByUser($userId, $filters);
        $paymentTypes = $this->paymentTypesService->getAllPaymentTypes();

        return View('user.invoice.index', compact('payments', 'events', 'request', 'paymentTypes'));
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