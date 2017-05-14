<?php

namespace App\Http\Controllers\Admin\Site\News;

use App\Http\Requests\Admin\Site\News\NewsRequest;
use App\Services\Site\NewsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsPostsController extends Controller
{
    /**
     * @var NewsService
     */
    private $newsService;

    /**
     * NewspostController constructor.
     * @param NewsService $newsService
     */
    public function __construct( NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->newsService->showAllNewsPaginate();

        return view('admin.Site.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Site.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store( NewsRequest $request)
    {
        $input = $request->except('_token', '_method', 'news_image', '_wysihtml5_mode');
        $photo = $request->file('news_image');

        $news = $this->newsService->storeNews($input);

        if ($news) {
            $imageName = $this->newsService->savePhoto($photo);
            $news->news_image = $imageName;
            $news->save();

            flash('News created successfully!');
            return redirect()->route('news.index');
        }

        flash('Failed to create news!', 'error');

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
        $news = $this->newsService->showNewsByID($id);
        return view('admin.Site.news.show', [
            'news' => $news
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
        $news = $this->newsService->showNewsByID($id);
        return view('admin.Site.news.edit', [
            'news' => $news
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( NewsRequest $request, $id)
    {
        $input = $request->except('_token', '_method', 'news_image', '_wysihtml5_mode', 'news_image_old');
        $photo = $request->file('news_image');

        $news = $this->newsService->updateNews($input, $id);
        if ($news) {
            $news_image = $this->newsService->handleNewsPhotoUpload($photo, $news);

            if (isset($photo) && $news_image) {
                $news->news_image = $news_image;
                $news->save();
            }

            flash('News Update successfully!');
            return redirect()->route('news.index');
        }

        flash('News Update unsuccessfully!', 'error');
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
        $news = $this->newsService->deleteNews($id);
        if ($news) {
            flash('News Delete successfully!');
            return redirect()->route('news.index');
        }

        flash('News Delete unsuccessfully!', 'error');
        return redirect()->route('news.index');
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function displayNewsBySearchText( Request $request)
    {
        $input = $request->except('_token','_method');
        $newsBySearchText = $this->newsService
            ->getNewsBySearchText(
                $input
            );
        return view(
            'admin.Site.news.display_news_by_search_text',
            compact(
                'newsBySearchText'
            )
        );
    }
}
