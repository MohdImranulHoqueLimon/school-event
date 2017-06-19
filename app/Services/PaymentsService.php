<?php

namespace App\Services;

use App\Models\Payments;

class PaymentsService extends BaseService
{

    public function __construct(Payments $payments)
    {
        $this->model = $payments;
    }
    
    function getAllPayments(array $filters)
    {
        $with = ['user', 'register_admin'];
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


}
