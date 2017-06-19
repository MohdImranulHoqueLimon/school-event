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
    public function index()
    {
        $user = Auth::user();
        $eventsList = $this->eventsService->getAllActiveEvents();
        $eventsPayments = $this->payementsService->getAllPaymentsForUser($user['id']);
        return view('user.payments.form', compact('eventsList','eventsPayments'));
    }

    public function getProcessList(Request $request)
    {
        return 'here will be the code';
    }

    
}