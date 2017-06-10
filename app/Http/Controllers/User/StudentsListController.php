<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\CountryService;
use App\Services\RegistrationAmountService;
use App\Services\RegistrationPaymentService;
use App\Services\UserService;
use Illuminate\Http\Request;

class StudentsListController extends Controller
{

    private $userService;
    private $countriesService;
    private $registrationPaymentService;

    /**
     * @param \App\Services\UserService $userService
     * @param RegistrationPaymentService $registrationPaymentService
     * @param CountryService $countryService
     */
    public function __construct(UserService $userService, RegistrationPaymentService $registrationPaymentService,
    CountryService $countryService)
    {
        $this->userService = $userService;
        $this->countriesService = $countryService;
        $this->registrationPaymentService = $registrationPaymentService;
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
        $users = $this->userService->getAllUser($filters);
        $roles = $this->userService->getAllRoles();
        return View('user.students.index', compact('users','roles','request'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = $this->userService->findUser($id);

        if (!$user) {
            flash('User not found!', 'error');

            return redirect()->route('users.index');
        }

        return view('user.students.show')->with('user', $user);
    }

    public function findHaveEmail(Request $request)
    {
        $input = $request->except('_token');
        $count = $this->userService->emailIsHave($input["email"], $input["user_id"]);
        $return["findUser"] = $count;
        if($count>0){
            $return["message"] = ('Email already have, please provide another email address!');
            $return["message_type"] = ('alert alert-danger alert-dismissible');
        }else{
            $return["message"] = '';
            $return["message_type"] = '';
        }
        return json_encode($return);
    }
}
