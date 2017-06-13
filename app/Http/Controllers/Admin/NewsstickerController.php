<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NewsstickerService;
use Illuminate\Http\Request;

class NewsstickerController extends Controller
{

    private $newstickerService;

    public function __construct(NewsstickerService $newstickerService)
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
        $newsstickers = $this->newstickerService->getAllNewssticker($filters);
        return View('admin.newssticker.index', compact('newsstickers'));
    }

    public function create()
    {
        return view('admin.newssticker.create');
    }

    public function show($id)
    {
        $newslist = $this->newstickerService->showNewsByID($id);
        return view('admin.newssticker.show', [
            'newslist' => $newslist
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->except('_token', '_wysihtml5_mode');
        $newslist = $this->newstickerService->store($input);

        if ($newslist) {
            flash('Testimonial created successfully!');
            return redirect()->route('newssticker.index');
        }

        flash('Failed to create Testimonial!', 'error');
        return redirect()->back()->withInput($request->all());
    }

    public function edit($id)
    {
        $newslist = $this->newstickerService->showNewsByID($id);
        return view('admin.newssticker.edit', [
            'newslist' => $newslist
        ]);
    }

    public function update( Request $request, $id)
    {
         $input = $request->except('_token', '_method', '_wysihtml5_mode');
        // print_r($input);

        $newslist = $this->newstickerService->updateNewssticker($input, $id);

        if ($newslist) {
            flash('Newssticker Update successfully!');
            return redirect()->route('newssticker.index');
        }

        flash('Failed to Update Newssticker!', 'error');
        return redirect()->back()->withInput($request->all());
    }
}
