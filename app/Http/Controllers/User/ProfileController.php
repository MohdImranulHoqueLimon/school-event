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

class ProfileController extends Controller
{

    public function __construct(StudentService $studentService)
    {

    }

    /**
     * Show the login page.
     *
     * @return \Response
     */
    public function index()
    {
        return view('user.profile');
    }
}