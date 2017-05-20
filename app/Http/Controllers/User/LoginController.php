<?php

namespace App\Http\Controllers\User;

/**
 * Created by Limon.
 * User: limon
 * Date: 5/20/17
 * Time: 9:05 PM
 */

use App\Http\Controllers\Controller;
use \App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->studentService = $studentService;
    }

    /**
     * Show the login page.
     *
     * @return \Response
     */
    public function login()
    {
        return view('auth.user.login');
    }

    /**
     * Perform the login.
     *
     * @param  Request $request
     * @return \Redirect
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, ['phone' => 'required', 'password' => 'required']);

        if ($this->isRegistered($request)) {

            if ($this->isNotVerified($request)) {
                flash('Verify Your phone Number First.');
                return redirect()->route('verify.code');
            } else {

                if ($this->signIn($request)) {
                    flash('Welcome back!');
                    //Log::info('Showing student profile', ['user_id' => auth()->user()->id]);
                    return redirect()->to('/auth-success');
                }

                flash('Invalid Phone/Password.');

                return redirect()->back();
            }
        } else {
            //flash('You are not Registered.Please Register First.');
            flash('Invalid Phone/Password.');
            return redirect()->to('pages/home');
        }

    }

    /**
     * Destroy the user's current session.
     *
     * @return \Redirect
     */
    public function logout()
    {
        Log::info('User Logged out', ['user_id' => auth()->user()->id]);
        Auth::logout();

        flash('You have now been signed out.');

        return redirect()->to('pages/home');
    }

    /**
     * Attempt to sign in the user.
     *
     * @param  Request $request
     * @return boolean
     */
    protected function signIn(Request $request)
    {
        return Auth::attempt($this->getCredentials($request), $request->has('remember'));
    }

    /**
     * Get the login credentials and requirements.
     *
     * @param  Request $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return [
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'status' => true
        ];
    }

    /**
     * @param Request $request
     */
    private function isRegistered(Request $request)
    {
        return $this->studentService->getQuery()
            ->where('phone', $request->input('phone'))
            ->first();
    }

    private function isNotVerified(Request $request)
    {
        return $this->studentService->getQuery()
            ->where('phone', $request->input('phone'))
            ->where('status', 0)
            ->first();
    }
}