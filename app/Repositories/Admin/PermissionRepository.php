<?php

namespace App\Repositories\Admin;

use App\Repositories\Repository;
use Spatie\Permission\Models\Permission;

class PermissionRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Permission::class;
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
     * @return mixed
     */
    public function allPermissions()
    {
        return $this->model->get(['name', 'id', 'created_at']);
    }
}