<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\PaymentsService;
use App\Services\EventsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    protected $paymentsService;
    protected $eventService;
    
    public function __construct(PaymentsService $paymentsService, EventsService $eventService)
    {
        $this->paymentsService = $paymentsService;
        $this->eventsService = $eventService;
    }

    /**
     * Show the login page.
     *
     * @return \Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $eventsList = $this->eventsService->getAllActiveEvents();
        $eventsPayments = $this->paymentsService->getAllPaymentsForUser($user['id']);

        return view('user.payments.form', compact('eventsList','eventsPayments'));
    }

    public function update(Request $request, $id) {

        $input = $request->except('_token', '_method', '_wysihtml5_mode');

        $paymentId = $input['id'];

        $payment = $this->paymentsService->getPaymentById($paymentId);

        //bank
        if($input['payment_type'] == 1) {

            $file = $request->file('bank_attachment');

            $destinationPath = 'upload/payment'; // upload path
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999) . time(). '.' . $extension; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path

            $payment->payment_type = 1;
            $payment->bkash_code = '';
            $payment->cash_note = null;
            $payment->bank_attachment = $fileName;
            $payment->save();

        }
        //bkash
        else if($input['payment_type'] == 2) {
            $bkashCode = $input['bkash_code'];
            $payment->payment_type = 2;
            $payment->bkash_code = $bkashCode;
            $payment->bank_attachment = '';
            $payment->cash_note = null;
            $payment->save();
        }
        //cash
        else {
            $cashNote = $input['note'];
            $payment->payment_type = 3;
            $payment->cash_note = $cashNote;
            $payment->bank_attachment = '';
            $payment->bkash_code = '';
            $payment->save();
        }

        return redirect()->back();
    }

    public function updatePaymentType(Request $request, $id) {
        return $request->all();
    }

    public function getProcessList(Request $request)
    {
        $filters = $request->all();
        $user = Auth::user();
        $eventsList = $this->eventsService->showEventsByID($filters['event_id']);
        return view('user.payments.process', compact('eventsList','user'));
    }

    public function checkoutPayment(Request $request)
    {
        $checkout_data = $request->all();
        return view('user.payments.checkout', compact('checkout_data'));
    }

    public function confirm(Request $request)
    {
        $input = $request->except('_token', '_wysihtml5_mode');
        $result = $this->paymentsService->store($input);

        if ($result) {
            flash('Payment created successfully!');
            return redirect()->route('invoice.index');
        }

        flash('Failed to create Payment!', 'error');
        return redirect()->back()->withInput($request->all());
    }

    public function how_to_complete()
    {
        return view('user.payments.how_to_complete__event');
    }

    
}