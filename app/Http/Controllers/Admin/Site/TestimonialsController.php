<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Requests\Admin\Site\TestimonialsRequest;
use App\Repositories\Admin\Site\TestimonialRepository;
use App\Services\Site\TestimonialService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * @var TestimonialService
     */
    private $testimonialService;
    /**
     * @var TestimonialRepository
     */
    private $testimonialRepository;

    /**
     * TestimonialsController constructor.
     * @param TestimonialRepository $testimonialRepository
     * @param TestimonialService $testimonialService
     */
    public function __construct( TestimonialRepository $testimonialRepository, TestimonialService $testimonialService)
    {
        $this->testimonialService = $testimonialService;
        $this->testimonialRepository = $testimonialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = $this->testimonialService->showAllTestimonialByPaginate();
        return view('admin.Site.testimonial.index', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Site.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TestimonialsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store( TestimonialsRequest $request)
    {
        $input = $request->except('_token', '_wysihtml5_mode');

        $testimonial = $this->testimonialService->storeTestimonial($input);

        if ($testimonial) {
            flash('Testimonial created successfully!');
            return redirect()->route('testimonials.index');
        }

        flash('Failed to create Testimonial!', 'error');
        return redirect()->back()->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = $this->testimonialService->showTestimonialByID($id);
        return view('admin.Site.testimonial.show', [
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = $this->testimonialService->showTestimonialByID($id);

        return view('admin.Site.testimonial.edit', [
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TestimonialsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( TestimonialsRequest $request, $id)
    {
        $input = $request->except('_token', '_method', '_wysihtml5_mode');

        $testimonial = $this->testimonialService->updateTestimonial($input, $id);

        if ($testimonial) {
            flash('Testimonial Update successfully!');
            return redirect()->route('testimonials.index');
        }

        flash('Failed to Update Testimonial!', 'error');
        return redirect()->back()->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = $this->testimonialService->deleteTestimonial($id);
        if ($testimonial) {
            flash('Testimonial Delete successfully!');
            return redirect()->route('testimonials.index');
        }

        flash('Failed to Delete Testimonial!', 'error');
        return redirect()->route('testimonials.index');
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function displayTestimonialsBySearchText( Request $request)
    {
        $input = $request->except('_token','_method');
        $testimonialsBySearchText = $this->testimonialService
            ->getNewsBySearchText(
                $input
            );
        return view(
            'admin.Site.testimonial.display_testimonials_by_search_text',
            compact(
                'testimonialsBySearchText'
            )
        );
    }
}
