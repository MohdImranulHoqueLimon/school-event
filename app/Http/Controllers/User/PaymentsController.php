<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Services\PaymentsService;
use App\Services\EventsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        $eventsList = $this->eventsService->getAllEvents();
        return view('user.payments.show', compact('eventsList'));
    }

    
}