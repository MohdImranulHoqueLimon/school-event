<?php

namespace App\Http\Controllers;

use App\Services\EventsService;
use App\Services\Site\NewsService;
use App\Services\Site\TestimonialService;
use Illuminate\Support\Facades\Redirect;

class ResultController extends Controller
{
    public function __construct()
    {

    }

    public function success()
    {
        return view('success');
    }

}
