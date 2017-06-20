<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\EventsService;
use App\Services\PaymentsService;
use App\Support\Configs\Constants;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    private $paymentService;
    private $eventService;

    public function __construct(PaymentsService $paymentsService, EventsService $eventsService)
    {
        $this->paymentService = $paymentsService;
        $this->eventService = $eventsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $payments = $this->paymentService->getAllPayments($filters);
        $events = $this->eventService->getAllActiveEvents();

        return View('admin.payment.index', compact('payments', 'request', 'events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function update(Request $request, $id)
    {
        $input = $request->except('_token', '_method', '_wysihtml5_mode');

        $newslist = $this->eventsService->updateEvents($input, $id);

        if ($newslist) {
            flash('Events Update successfully!');
            return redirect()->route('events.index');
        }

        flash('Failed to Update Events!', 'error');
        return redirect()->back()->withInput($request->all());
    }

    public function destroy($id)
    {
        $deletePayment = $this->paymentService->deletePayment($id);
        if ($deletePayment) {
            flash('Payment Delete successfully!');
            return redirect()->back();
        }

        flash('Payment Delete unsuccessfully!', 'error');
        return redirect()->back();
    }

    public function approvePayment($id) {
        $result = $this->changePaymentStatus($id, Constants::$PAYMENT_ACTIVE);
        if($result) {
            flash('Successfully approved payment');
        } else {
            flash('Failed to approved payment');
        }
        return redirect()->back();
    }

    public function pendingPayment($id) {
        $result = $this->changePaymentStatus($id, Constants::$PAYMENT_PENDING);
        if($result) {
            flash('Successfully pending to payment');
        } else {
            flash('Failed to pending to payment');
        }
        return redirect()->back();
    }

    public function cancelPayment($id) {
        $result = $this->changePaymentStatus($id, Constants::$PAYMENT_CANCEL);
        if($result) {
            flash('Successfully cancel payment');
        } else {
            flash('Failed to cancel payment');
        }
        return redirect()->back();
    }

    private function changePaymentStatus($id, $status) {
        $payment = $this->paymentService->find($id);
        $payment->status = $status;
        return $payment->save();
    }
}
