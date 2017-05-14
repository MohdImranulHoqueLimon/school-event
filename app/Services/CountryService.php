<?php

namespace App\Services;


use App\Repositories\Admin\CountryRepository;

class CountryService
{
    /**
     * @var CountryRepository
     */
    private $countryRepository;

    /**
     * CountryService constructor.
     * @param CountryRepository $countryRepository
     */
    public function __construct( CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * @return mixed
     */
    public function showAllCountries()
    {
        return $this->countryRepository->allCountries();
    }
}