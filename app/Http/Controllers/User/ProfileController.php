<?php

namespace App\Http\Controllers\User;

/**
 * Created by Limon.
 * User: limon
 * Date: 5/20/17
 * Time: 9:05 PM
 */

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\CountryService;
use App\Services\RegistrationPaymentService;
use \App\Services\StudentService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    private $userService;
    private $countryService;
    private $registrationPaymentService;

    public function __construct(UserService $userService, CountryService $countryService, RegistrationPaymentService $registrationPaymentService)
    {
        $this->middleware('auth');

        $this->userService = $userService;
        $this->countryService = $countryService;
        $this->registrationPaymentService = $registrationPaymentService;
    }

    /**
     * Show the login page.
     *
     * @return \Response
     */
    public function index()
    {
        $user = Auth::user();
        $countries = $this->countryService->getAllCountries();
        return view('user.profile', compact('user', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $this->validation($request, $id);
        $password = $request->get('password');

        if (!empty(trim($password)) && trim($password) != '') {
            $is_updated = $this->userService->updateUser($request->except('_token', '_method', 'user_image'), $id);
        } else {
            $is_updated = $this->userService->updateUser($request->except('_token', '_method', 'user_image', 'password'), $id);
        }
        $photo = $request->file('user_image');

        if ($is_updated) {

            $user = $this->userService->findUser($id);
            if($photo != '' || $photo != null) {
                $this->userService->removePhoto($user->user_image);
                $imageName = $this->userService->savePhoto($photo);
                $user->user_image = $imageName;
                $user->save();
            }
            flash('User updated successfully.');
        } else {
            flash('Failed to update user!', 'error');
        }

        return redirect()->back();
    }

    private function validation($request, $user_id) {
        $rules = [
            'name' => 'required',
            'batch' => 'required',
            'profession' => 'required',
            'country' => 'required',
            'phone' => ['required', 'max:15', Rule::unique('users')->ignore($user_id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user_id)],
            'address' => 'required'
        ];
        $this->validate($request, $rules);
    }
}