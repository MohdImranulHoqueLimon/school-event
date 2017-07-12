<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Services\UserService;
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
        'name' => 'required',
        'phone' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'address' => 'required',
        'password' => 'required'
    ];

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/success-page';
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('guest');
        $this->userService = $userService;
    }

    /**
     * Handle a registration request for the application
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validate($request, $this->rules);

        $data = $request->except(['_token', 'rpassword', 'tnc', 'user_image']);
        $data['password'] = bcrypt($data['password']);
        $data['status'] = 0;

        $user = User::create($data);

        $photo = $request->file('user_image');
        $imageName = $this->userService->savePhoto($photo);
        $user->user_image = $imageName;
        $user->save();

        $this->assignUserRole($user->id);

        if ($user) {
            flash('Successfully registered, Please confirm your payment');
            return $this->registered($request, $user) ?: redirect($this->redirectPath());
        } else {
            redirect()->back();
        }
    }

    private function assignUserRole($uid) {
        if(!empty($uid)) {
            $is_assigned = $this->userService->assignRolesToUser(['roles' => [2]], $uid);
        }
    }
}
