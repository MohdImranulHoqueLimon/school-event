<?php

namespace App\Repositories\Admin\Site;

use App\Models\Admin\Site\Testimonial;
use App\Repositories\Repository;
use App\Services\UtilityService;

class TestimonialRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Testimonial::class;
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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allTestimonial()
    {
        $query = $this->getQuery();

        return $query->orderBy('id', 'DESC')->get();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function allTestimonialPaginate()
    {
        $query = $this->getQuery();

        return $query->orderBy('id', 'DESC')->paginate(UtilityService::$displayRecordPerPage);
    }

    /**
     * @param $searchText
     * @return mixed
     */
    public function getNewsBySearchText( $searchText)
    {
        $query = $this->getQuery();
        if (isset($searchText)) {
            $query->where('testimonial_client', 'LIKE', '%' . $searchText . '%')
                ->orWhere('testimonial_designation', 'LIKE', '%' . $searchText . '%')
                ->orWhere('testimonial_company', 'LIKE', '%' . $searchText . '%')
                ->orWhere('testimonial_body', 'LIKE', '%' . $searchText . '%');
        }

        return $query->orderBy('created_at', 'DESC')->paginate(UtilityService::$displayRecordPerPage);
    }
}