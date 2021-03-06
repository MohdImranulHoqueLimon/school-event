<?php

namespace App\Http\Controllers\StudentAuth;

use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    private $rules = [
        'full_name' => 'required',
        'phone' => 'required|unique:students',
        'email' => 'required|email|unique:students',
        'address' => 'required',
        'city' => 'required'
    ];

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/success-page';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validate($request, $this->rules);

        $data = $request->except(['_token', 'rpassword', 'tnc']);
        $data['password'] = bcrypt($data['password']);
        $data['status'] = 0;

        $student = Student::create($data);

        if ($student) {
            flash('Successfully registered, Please confirm your payment');
            return $this->registered($request, $student) ?: redirect($this->redirectPath());
        } else {
            redirect()->back();
        }
    }
}
