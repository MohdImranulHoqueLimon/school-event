<?php

namespace App\Http\Controllers\User;

/**
 * Created by Limon.
 * User: limon
 * Date: 5/20/17
 * Time: 9:05 PM
 */

use App\Http\Controllers\Controller;
use App\Services\CountryService;
use \App\Services\StudentService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $userService;
    private $countryService;

    public function __construct(UserService $userService, CountryService $countryService)
    {
        $this->userService = $userService;
        $this->countryService = $countryService;
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
}