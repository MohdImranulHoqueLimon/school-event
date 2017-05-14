<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Status;
use App\Repositories\Repository;

class StatusRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Status::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param       $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    /**
     * @return mixed
     */
    public function allStatus()
    {
        return $this->model->get();
    }
}