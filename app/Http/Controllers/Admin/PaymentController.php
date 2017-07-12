<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\EmailService;
use App\Services\EventsService;
use App\Services\PaymentsService;
use App\Services\UserService;
use App\Support\Configs\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    private $paymentService;
    private $eventService;
    private $emailService;
    private $userService;

    public function __construct(
        PaymentsService $paymentsService, EventsService $eventsService, EmailService $emailService, UserService $userService
    )
    {
        $this->paymentService = $paymentsService;
        $this->eventService = $eventsService;
        $this->emailService = $emailService;
        $this->userService = $userService;
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
        //$payments = $this->paymentService->getAllPayments($filters);
        $payments = $this->paymentService->getAllPaymentsForAdmin(Auth::user()->id);
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

        $userObj = $this->userService->findById(Auth::user()->id);
        $invoiceHtml = $this->paymentService->getInvoiceHtml($id);
        $this->emailService->mailSendProcess($userObj->email, 'School Event', 'Your payment approved<br/>' . $invoiceHtml);

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
