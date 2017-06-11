<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NewstickerService;
use Illuminate\Http\Request;

class NewstickerController extends Controller
{

    private $newstickerService;

    public function __construct(NewstickerService $newstickerService)
    {
        $this->newstickerService = $newstickerService;
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
        $newsticker = $this->newstickerService->getAllNewsticker($filters);
        return View('admin.newsticker.index', compact('newsticker'));
    }

    public function create()
    {
        return view('admin.newsticker.create');
    }

    public function show($id)
    {
        $newslist = $this->newstickerService->showNewsByID($id);
        return view('admin.newsticker.show', [
            'newslist' => $newslist
        ]);
    }

    public function store( NewstickerService $request)
    {
        $input = $request->except('_token', '_wysihtml5_mode');
        print_r($input);
        die();

        $testimonial = $this->newstickerService->store($input);

        if ($testimonial) {
            flash('Testimonial created successfully!');
            return redirect()->route('newsticker.index');
        }

        flash('Failed to create Testimonial!', 'error');
        return redirect()->back()->withInput($request->all());
    }
}
