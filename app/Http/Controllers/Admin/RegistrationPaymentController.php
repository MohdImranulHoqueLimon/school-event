<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\RegistrationPaymentService;
use App\Services\StudentService;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegistrationPaymentController extends Controller
{
    private $rules = [
        'full_name' => 'required',
        'phone' => 'required|unique:students',
        'email' => 'required|email|unique:students',
        'address' => 'required',
        'city' => 'required'
    ];

    private $registrationPaymentService;
    private $userService;

    public function __construct(RegistrationPaymentService $registrationPaymentService, UserService $userService)
    {
        $this->userService = $userService;
        $this->registrationPaymentService = $registrationPaymentService;
    }

    public function index(Request $request)
    {
        return $register_payments  = $this->registrationPaymentService->getAllPayments($request->all());
        $registers = $this->registrationPaymentService->getAllRegisters();
        $sumResult = $this->registrationPaymentService->getAllPaymentsSum();
        return View('admin.payment.registration.index', compact('register_payments','registers', 'sumResult', 'request'));
    }

}
