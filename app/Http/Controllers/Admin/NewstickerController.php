<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NewsstickerService;
use Illuminate\Http\Request;

class NewstickerController extends Controller
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
        return View('admin.newsticker.index', compact('newsstickers'));
    }

    public function show($id)
    {
        $newslist = $this->newstickerService->showNewsByID($id);
        return view('admin.newsticker.show', [
            'newslist' => $newslist
        ]);
    }

    
}
