<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentTypes;
use App\Services\EmailService;
use App\Services\EventsService;
use App\Services\PaymentsService;
use App\Services\PaymentTypesService;
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
    private $paymentTypesService;

    public function __construct(
        PaymentsService $paymentsService, EventsService $eventsService, EmailService $emailService, UserService $userService,
        PaymentTypesService $paymentTypesService
    )
    {
        $this->paymentService = $paymentsService;
        $this->eventService = $eventsService;
        $this->emailService = $emailService;
        $this->userService = $userService;
        $this->paymentTypesService = $paymentTypesService;
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

        if(!empty($filters['csv'])) {
            return $this->downloadCsv($filters);
        }

        $payments = $this->paymentService->getAllPaymentsForAdmin(Auth::user()->id, $filters);
        $events = $this->eventService->getAllActiveEvents();
        $paymentTypes = $this->paymentTypesService->getAllPaymentTypes();
        $sumResults = $this->paymentService->getAllSumResultsByFilter($filters);

        return View('admin.payment.index', compact('payments', 'request', 'events', 'paymentTypes', 'sumResults'));
    }

    public function downloadCsv($filters) {

        $payments = $this->paymentService->getAllPaymentsWithForAdmin(Auth::user()->id, $filters);
        $payments = $payments->get();

        $csv = "Name, Event Title, Payment Type, Total Amount, Own Ticket Amount, Total Guest Amount\n";
        foreach ($payments as $payment) {

            $name = $payment->user->name;
            $event = $payment->event->title;
            $guestAmount = ($payment->event->guest_amount && $payment->event->guest_amount > 0) ? $payment->event->guest_amount : 0;
            $guestCount = ($payment->guest_count && $payment->guest_count > 0) ? $payment->guest_count : 0;

            $totalGuestAmount = $guestAmount * $guestCount;
            $ownTicketAmount = $payment->amount - $totalGuestAmount;
            $totalAmount = $payment->amount;

            if($payment->payment_type == 1) $paymentType = 'Bank';
            if($payment->payment_type == 2) $paymentType = 'Bkash';
            if($payment->payment_type == 3) $paymentType = 'Cash';

            $csv .= $name . ',' . $event . ',' . $paymentType . ',' . $totalAmount . ',' . $ownTicketAmount . ',' . $totalGuestAmount . "\n";
        }

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Disposition: attachment; filename=report.csv");

        echo $csv;

        exit();
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
        $invoiceHtml = $this->paymentService->getInvoiceHtmlForEmail($id);
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

        if($status == Constants::$PAYMENT_ACTIVE) {
            $payment->approved_by = Auth::user()->id;
        } else{
            $payment->approved_by = NULL;
        }

        return $payment->save();
    }

    public function registerEvent($id) {
        $userObj = $this->userService->findById($id);
         
        $eventsList = $this->eventService->getAllActiveEvents();
        $eventsPayments = $this->paymentService->getAllPaymentsForUser($id);
        
        return View('admin.payment.register_event', compact('userObj', 'eventsPayments','eventsList'));
    }

    public function conformEvent(Request $request)
    {
        $filters = $request->all();
         $input['amount'] = $filters['amount'];
         $input['guest_count'] = $filters['guest_count'];
          $input['event_id'] = $filters['event_id'];

        if($filters['guest_amount']){
            $input['amount'] = $filters['amount'] + $filters['guest_amount'];
        }

        $result = $this->paymentService->store($input);
        
        if ($result) {
            flash('Payment created successfully!');
            return redirect('admin/payments');
        }

        flash('Failed to create Payment!', 'error');
        return redirect()->back()->withInput($request->all());
    }
}
