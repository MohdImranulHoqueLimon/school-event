<?php

namespace App\Services;

use App\Models\Countries;

class CountryService extends BaseService
{

    public function __construct(Countries $countries)
    {
        $this->model = $countries;
    }

    function getAllCountries()
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
}
