<?php

namespace App\Repositories\Admin\Site\News;

use App\Models\Admin\Site\News;
use App\Repositories\Repository;
use App\Services\UtilityService;

class NewsRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return News::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function showAllNews()
    {
        $query = $this->getQuery();

        return $query->orderBy ( 'id' , 'DESC' )->get ();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function showAllNewsPaginate()
    {
        $query = $this->getQuery();

        return $query->orderBy ( 'id' , 'DESC' )->paginate(UtilityService::$displayRecordPerPage);
    }

    public function getAllActiveNews() {
        return $this->getQuery()->where('is_active', 1)->orderBy ( 'id' , 'DESC' )->get();
    }

    /**
     * @param $filter
     * @return mixed
     */
    public function allNews( $filter)
    {
        $query = $this->getQuery();

        return $query->orderBy ( 'id' , 'DESC' )->get ();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function allNewsNotID( $id )
    {
        $query = $this->getQuery()->where('id', '!=', $id);
        return $query->orderBy ( 'id' , 'DESC' )->take(5)->get();
    }

    /**
     * @param $searchText
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getNewsBySearchText( $searchText )
    {
        $query = $this->getQuery();
        if(isset($searchText)){
            $query->where('news_title', 'LIKE', '%'.$searchText.'%')
                ->orWhere('news_body', 'LIKE', '%'.$searchText.'%');
        }

        $query->where('created_at', '!=', 'null');

        return $query->orderBy('news_title', 'ASC')->paginate(UtilityService::$displayRecordPerPage);
    }
}