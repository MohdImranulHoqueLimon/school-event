<?php

namespace App\Services;

use App\Models\PaymentTypes;

class PaymentTypesService extends BaseService
{

    public function __construct(PaymentTypes $paymentTypes)
    {
        $this->model = $paymentTypes;
    }

    public function getAllPaymentTypes() {
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
