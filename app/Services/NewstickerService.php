<?php

namespace App\Services;

use App\Models\Newsticker;

class NewstickerService extends BaseService
{

    public function __construct(Newsticker $newsticker)
    {
        $this->model = $newsticker;
    }

    function getAllNewsticker()
    {
        return $this->model->get();
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

    public function showNewsByID($id)
    {
        return $this->model->find($id);
    }

     public function store( array $input )
    {
        $input['created_by'] = auth()->user()->id;

        return $this->model->create($input);
    }
}
