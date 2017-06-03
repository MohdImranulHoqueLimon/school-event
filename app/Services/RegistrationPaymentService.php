<?php

namespace App\Services;

use App\Models\RegistrationPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistrationPaymentService extends BaseService
{

    public function __construct(RegistrationPayment $registrationPayment)
    {
        $this->model = $registrationPayment;
    }

    public function updateAmountByUser($userId, $amount) {

        if(!empty($userId) && !empty($amount)) {

            try{
                $registrationAmount = $this->model->where('user_id', $userId)->first();
                if($registrationAmount) {
                    $registrationAmount->amount = $amount;
                    $registrationAmount->update();
                }
                else {
                    $this->model->create([
                        'amount' => $amount,
                        'user_id' => $userId,
                        'registered_by' => Auth::user()->id
                    ]);
                }
            }catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }
    }

    public function getAllPaymentsSum() {
        return $this->model->get()->sum('amount');
    }

    public function getAllRegisters() {
        return $this->model->select('registered_by')->with(['register_admin'])->groupBy('registered_by')->get();
    }

    public function getAllPayments(array $filters) {
        $with = ['user', 'register_admin'];
        return $this->getAllPaymentsWith($with, $filters)->paginate(UtilityService::$displayRecordPerPage);
    }

    public function getAllPaymentsWith(array $with, $filters)
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
        } else {
            $query->with($with);
        }

        return $query;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param $query
     */
    public function filterData(array $filter, $query)
    {
        if (isset($filter['batch'])) {
            $query->where('batch', 'LIKE', "%{$filter['batch']}%");
        }

        if (isset($filter['email'])) {
            $query->where('email', 'LIKE', "%{$filter['email']}%");
        }

        $this->query->with(['user']);
    }
}
