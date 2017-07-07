<?php

namespace App\Services\Site;

use App\Repositories\Admin\Site\News\NewsRepository;
use File;
use Image;
use Webpatser\Uuid\Uuid;

class NewsService
{
    /**
     * NewsService constructor.
     * @param NewsRepository $newsRepository
     */
    public function __construct( NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * @param array $input
     *
     * @return mixed
     */
    public function storeNews(array $input)
    {
        $input['news_uuid'] = Uuid::generate();
        $input['user_id'] = auth()->user()->id;
        $input['created_by'] = auth()->user()->id;

        return $this->newsRepository->create($input);
    }

    /**
     * @param $photo
     *
     * @return null|string
     */
    public function savePhoto($photo)
    {
        if (isset($photo)) {
            $photoname = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('images/thumbnail_images');
            $thumb_img = Image::make($photo->getRealPath())->resize(362, 231);
            $thumb_img->save($destinationPath . '/' . $photoname, 80);
            $destinationPath = public_path('images/normal_images');
            $normal_img = Image::make($photo->getRealPath())->resize(848, 335);
            $normal_img->save($destinationPath . '/' . $photoname, 80);
            return $photoname;
        }

        return null;
    }

    public function getActiveNewsList() {
        return $this->newsRepository->getAllActiveNews();
    }

    /**
     * @param $photo_name
     *
     * @return bool
     */
    public function removePhoto($photo_name)
    {
        if (!$photo_name) {
            return false;
        }

        $destinationPath = public_path('images/thumbnail_images');

        $deleteOldImage = $destinationPath . '/' . $photo_name;
        if (File::isFile($deleteOldImage)) {
            File::delete($deleteOldImage);
        }

        return true;
    }

    /**
     * @param $input
     * @param $id
     *
     * @return mixed
     */
    public function updateNews($input, $id)
    {
        try {
            $news = $this->newsRepository->find($id);
        } catch (\Exception $e) {
            return false;
        }

        $input['updated_by'] = auth()->user()->id;

        $this->newsRepository->update($input, $id);

        return $news;
    }

    /**
     * @param $photo
     * @param $news
     *
     * @return null|string
     */
    public function handleNewsPhotoUpload($photo, $news)
    {
        $newImageName = $this->savePhoto($photo);

        if ($newImageName) {
            // remove this
            $news_image_old = $news->news_image;
            $this->removePhoto($news_image_old);
        }

        return $newImageName;
    }

    /**
     * @return mixed
     */
    public function showAllNews()
    {
        return $this->newsRepository->showAllNews();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function showAllNewsPaginate()
    {
        return $this->newsRepository->showAllNewsPaginate();
    }

    /**
     * @param $filter
     *
     * @return mixed
     */
    public function allNews($filter)
    {
        return $this->newsRepository->allNews($filter);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function showNewsByID($id)
    {
        return $this->newsRepository->find($id);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function showAllNewsByNotID($id)
    {
        return $this->newsRepository->allNewsNotID($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteNews( $id )
    {
        return $this->newsRepository->delete($id);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function getNewsBySearchText( $input )
    {
        $searchText = $input["searchText"];
        return $this->newsRepository->getNewsBySearchText($searchText);
    }
}
