<?php

namespace App\Http\Controllers;

use App\Services\Site\NewsService;
use App\Services\Site\TestimonialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * @var TestimonialService
     */
    private $testimonialService;
    /**
     * @var NewsService
     */
    private $newsService;

    /**
     * Create a new controller instance.
     *
     * @param TestimonialService $testimonialService
     * @param NewsService $newsService
     */
    public function __construct(TestimonialService $testimonialService, NewsService $newsService)
    {
        //$this->middleware('auth');
        $this->testimonialService = $testimonialService;
        $this->newsService = $newsService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function about()
    {
        $testimonial = $this->testimonialService->showAllTestimonial();
        return view('public.about-us', compact('testimonial'));
    }

    public function services()
    {
        $testimonial = $this->testimonialService->showAllTestimonial();
        return view('public.service', compact('testimonial'));
    }

    public function servicesdetails()
    {
        return view('public.services-details');
    }

    public function blog()
    {
        return view('blog');
    }

    public function fleet()
    {
        return view('public.fleet');
    }

    public function blogpost()
    {
        return view('public.news-details');
    }

    public function location()
    {
        return view('public.location');
    }

    public function achivement()
    {
        return view('achivement');
    }

    public function storage()
    {
        return view('storage');
    }

    public function faq()
    {
        return view('faq');
    }

    public function contact()
    {
        return view('public.contact-us');
    }

    /**
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function newsdetails($id)
    {
        $relatednews = $this->newsService->showAllNewsByNotID($id);
        $news = $this->newsService->showNewsByID($id);
        return view('public.news-details', compact('news', 'relatednews'));
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function news()
    {
        $news = $this->newsService->showAllNews();
        return view('public.news', compact('news'));
    }

    public function login(){
        return Redirect::to('/admin');
    }

}
