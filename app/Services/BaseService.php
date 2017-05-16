<?php

namespace App\Services;

/**
 * Class BaseService
 * @package App\Services
 */
abstract class BaseService
{
    /**
     * @var int
     */
    protected $recordPerPage = 15;
    protected $model;

    /**
     * Get paginated filtered data.
     *
     * @param array $filter
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getFilterWithPaginatedData(array $filter)
    {
        $query = $this->getQuery();

        if (!empty($filter)) {
            $this->filterData($filter, $query);
        }

        return $query->orderBy('id', 'DESC')->paginate($this->recordPerPage);
    }

    /**
     * Get paginated filtered data.
     *
     * @param $length
     * @param array $filter
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getFilterWithFixedPaginatedData($length,array $filter)
    {
        $query = $this->getQuery();

        if (!empty($filter)) {
            $this->filterData($filter, $query);
        }

        return $query->orderBy('id', 'DESC')->paginate($length);
    }


    /**
     * Create user
     *
     * @param $all
     *
     * @return Model
     */
    public function create(array $all)
    {
        return $this->model->create($all);
    }

    /**
     * Get resource with relations data.
     *
     * @param $id
     * @param array $relations
     *
     * @return mixed
     */
    public function findWithRelations($id, array $relations)
    {
        return $this->model->with($relations)->findOrFail($id);
    }

    /**
     * Get specific columns with relations
     *
     * @param array $columns
     * @param array $relations
     * @return mixed
     */
    public function getWithRelations(array $columns, array $relations = [])
    {
        if (empty($relations)) {
            return $this->model->get($columns);
        }

        return $this->model->with($relations)->get($columns);
    }

    /**
     * Find resource by primary key
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Find first resource
     *
     * @return mixed
     */
    public function first()
    {
        return $this->model->first();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Return lists array
     *
     * @param $title
     * @param $id
     *
     * @return array
     */
    public function lists($title, $id)
    {
        return $this->model->lists($title, $id);
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->model->newQuery();
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param $query
     */
    abstract public function filterData(array $filter, $query);
}