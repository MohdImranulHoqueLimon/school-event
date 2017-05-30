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

    public function getAllPayments($request) {

        /*$payments = DB::select(
            "SELECT 
                rp.amount, 
                rp.user_id, 
                rp.registered_by,
                u.name,
                u.phone
            FROM registration_payment rp
            LEFT JOIN users u 
            ON u.id = rp.user_id
            "
        );

        return $this->filterData([], $this->model->get());*/

        return $this->findWithRelations(1, 'user_info');
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

        $query->with(['users']);
    }
}
