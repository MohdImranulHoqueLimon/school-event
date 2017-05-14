<?php

namespace App\Services\Site;

use App\Repositories\Admin\Site\TestimonialRepository;

class TestimonialService
{
    /**
     * @var TestimonialRepository
     */
    private $testimonialRepository;

    /**
     * TestimonialService constructor.
     * @param TestimonialRepository $testimonialRepository
     */
    public function __construct( TestimonialRepository $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function storeTestimonial( array $input )
    {
        $input['testimonial_uuid'] = 'uuid';
        $input['created_by'] = auth()->user()->id;

        return $this->testimonialRepository->create($input);
    }

    /**
     * @param array $input
     * @param $id
     * @return mixed
     */
    public function updateTestimonial( array $input, $id )
    {
        $input['updated_by'] = auth()->user()->id;

        return $this->testimonialRepository->update($input, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showTestimonialByID( $id )
    {
        return $this->testimonialRepository->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function showAllTestimonial()
    {
        return $this->testimonialRepository->allTestimonial();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function showAllTestimonialByPaginate()
    {
        return $this->testimonialRepository->allTestimonialPaginate();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteTestimonial( $id )
    {
        return $this->testimonialRepository->delete($id);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function getNewsBySearchText( $input )
    {
        $searchText = $input["searchText"];
        return $this->testimonialRepository->getNewsBySearchText($searchText);
    }
}