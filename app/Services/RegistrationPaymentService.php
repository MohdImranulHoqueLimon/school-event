<?php

namespace App\Services;

use App\Models\RegistrationPayment;
use App\Services\BaseService;
use App\Models\RegistrationAmount;
use Illuminate\Support\Facades\Auth;

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
                        'registered_by' => 1
                    ]);
                }
            }catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }
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
