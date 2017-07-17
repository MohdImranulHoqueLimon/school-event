<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\PaymentsService;
use App\Services\EventsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    private $paymentsService;
    private $eventService;
    
    public function __construct( PaymentsService $paymentsService, EventsService $eventService)
    {
   
        $this->payementsService = $paymentsService;
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
        $eventsPayments = $this->payementsService->getAllPaymentsForUser($user['id']);
        return view('user.payments.form', compact('eventsList','eventsPayments'));
    }

    public function update(Request $request, $id) {
        $input = $request->except('_token', '_method', '_wysihtml5_mode');

        return $input;
    }

    public function updatePaymentType(Request $request, $id) {
        return $request->all();
    }

    public function getProcessList(Request $request)
    {
        $filters = $request->all();
        $user = Auth::user();
        $eventsList = $this->eventsService->showEventsByID($filters['event_id']);
        return view('user.payments.process', compact('eventsList'));
    }

    public function checkoutPayment(Request $request)
    {
        $checkout_data = $request->all();
        return view('user.payments.checkout', compact('checkout_data'));
    }

    public function confirm(Request $request)
    {
        $input = $request->except('_token', '_wysihtml5_mode');
        $result = $this->payementsService->store($input);

        if ($result) {
            flash('Payment created successfully!');
            return redirect()->route('invoice.index');
        }

        flash('Failed to create Payment!', 'error');
        return redirect()->back()->withInput($request->all());
    }

    public function invoices()
    {
       echo 'ok';
    }

    
}