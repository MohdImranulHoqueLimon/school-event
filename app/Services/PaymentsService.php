<?php

namespace App\Services;

use App\Models\Payments;

class PaymentsService extends BaseService
{

    public function __construct(Payments $payments)
    {
        $this->model = $payments;
    }

    public function getPaymentsByUser($user_id) {
        return $this->model->where('user_id', $user_id)->paginate(UtilityService::$displayRecordPerPage);
    }
    
    function getAllPayments(array $filters)
    {
        return $this->getAllPaymentsWith($filters)->paginate(UtilityService::$displayRecordPerPage);
    }

    public function getAllPaymentsWith($filters)
    {
        $query = $this->getQuery();
        if (isset($filters['event_id']) && $filters['event_id']) {
            $query->where('event_id', '=', "{$filters['event_id']}");
        }
        return $query;
    }

    public function deletePayment($id) {
        return $this->model->where('id', $id)->delete();
    }

    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    function getAllPaymentsForUser($user_id)
    {
        return $this->model->where('user_id', '=', $user_id)->get();
    }


    public function store( array $input )
    {
        $input['user_id'] = auth()->user()->id;
        return $this->model->create($input);
    }
}
