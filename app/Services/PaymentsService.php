<?php

namespace App\Services;

use App\Models\Payments;

class PaymentsService extends BaseService
{

    public function __construct(Payments $payments)
    {
        $this->model = $payments;
    }

    
    function getAllPayments()
    {
        return $this->model->where('status', '=', 1)->get();
    }

    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }


}
