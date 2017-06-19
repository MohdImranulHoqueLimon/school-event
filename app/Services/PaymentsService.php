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
        return $this->getAllPaymentsWith($with, $filters)->paginate(UtilityService::$displayRecordPerPage);
    }

    public function getAllPaymentsWith($filters)
    {
        $query = $this->getQuery();

        if (isset($filters['registered_by']) && $filters['registered_by']) {
            $query->where('registered_by', '=', $filters['registered_by']);
        }

        if (isset($filters['batch']) && $filters['batch']) {
            $query->whereHas('user', function ($q) use ($filters) {
                $q->where('batch', $filters['batch']);
            });
        }

        if (isset($filters['name']) && $filters['name']) {
            $query->where('name', 'like', "%{$filters['name']}%");
        }

        if (isset($filters['email']) && $filters['email']) {
            $query->where('email', 'like', "%{$filters['email']}%");
        }

        if (isset($filters['role_id']) && $filters['role_id']) {
            $query->whereHas('roles', function ($q) use ($filters) {
                $q->where('role_id', $filters['role_id']);
            });
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
