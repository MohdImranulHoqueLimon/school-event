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
        
        //return $this->registrationPaymentService->getAllPayments();

        return $register_paymentts = $this->registrationPaymentService->getFilterWithPaginatedData($request->get('filter', ['user_type' => 2]));
        $roles = $this->userService->getAllRoles();
        return View('admin.payment.registration.index', compact('register_paymentts','roles','request'));
    }

}
