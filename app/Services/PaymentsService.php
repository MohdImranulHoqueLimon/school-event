<?php

namespace App\Services;

use App\Models\Payments;
use Illuminate\Support\Facades\Auth;

class PaymentsService extends BaseService
{

    public function __construct(Payments $payments)
    {
        $this->model = $payments;
    }

    public function getPaymentsByUser($user_id, $filters)
    {
        if(!empty($filters) && !empty($filters['event_id']) && $filters['status'] != '') {
            return $this->model
                ->where('user_id', $user_id)
                ->where('event_id', $filters['event_id'])
                ->where('status', $filters['status'])
                ->paginate(UtilityService::$displayRecordPerPage);
        }

        if(!empty($filters) && empty($filters['event_id']) && $filters['status'] != '') {
            return $this->model
                ->where('user_id', $user_id)
                ->where('status', $filters['status'])
                ->paginate(UtilityService::$displayRecordPerPage);
        }

        if(!empty($filters) && !empty($filters['event_id'])) {
            return $this->model
                ->where('user_id', $user_id)
                ->where('event_id', $filters['event_id'])
                ->paginate(UtilityService::$displayRecordPerPage);
        }


        return $this->model->where('user_id', $user_id)->paginate(UtilityService::$displayRecordPerPage);
    }

    function getAllPayments(array $filters)
    {
        return $this->getAllPaymentsWith($filters)->paginate(UtilityService::$displayRecordPerPage);
    }

    public function getAllPaymentsForAdmin($adminId, $filters) {
        /*if(isset($filters['event_id']) && !empty($filters['event_id'])) {
            return $this->model
                ->where('approved_by', '=', '')
                ->orWhere('approved_by', '=', NULL)
                ->orWhere('approved_by', '=', $adminId)
                ->where('event_id', '=', $filters['event_id'])
                ->paginate(UtilityService::$displayRecordPerPage);
        }
        return $this->model
            ->where('approved_by', '=', '')
            ->orWhere('approved_by', '=', NULL)
            ->orWhere('approved_by', '=', $adminId)
            ->paginate(UtilityService::$displayRecordPerPage);*/

        return $this->getAllPaymentsWithForAdmin($adminId, $filters)->paginate(UtilityService::$displayRecordPerPage);
    }

    public function getAllPaymentsWithForAdmin($adminId, $filters)
    {
        $query = $this->getQuery();

        $query->where(function ($query) {
            $query->where('approved_by', '=', NULL)
                ->orWhere('approved_by', '=', Auth::user()->id);
        });

        if (isset($filters['event_id']) && $filters['event_id']) {
            $query->where('event_id', '=', "{$filters['event_id']}");
        }

        if (isset($filters['status'])) {
            $query->where('status', '=', $filters['status']);
        }

        if (isset($filters['name']) && $filters['name']) {
            $query->whereHas('user', function ($q) use ($filters) {
                $q->where('name', 'like', "%{$filters['name']}%");
            });
        }

        if (isset($filters['email']) && $filters['email']) {
            $query->whereHas('user', function ($q) use ($filters) {
                $q->where('email', 'like', "%{$filters['email']}%");
            });
        }

        return $query;
    }

    public function getAllPaymentsWith($filters)
    {
        $query = $this->getQuery();
        if (isset($filters['event_id']) && $filters['event_id']) {
            $query->where('event_id', '=', "{$filters['event_id']}");
        }
        return $query;
    }

    public function deletePayment($id)
    {
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


    public function store(array $input)
    {
        $input['user_id'] = auth()->user()->id;
        return $this->model->create($input);
    }

    public function getPaymentById($id) {
        return $this->model->find($id);
    }

    public function getInvoiceHtml($id)
    {
        $paymentInfo = $this->model->find($id);

        $guestAmount = ($paymentInfo->event->guest_amount && $paymentInfo->event->guest_amount > 0) ? $paymentInfo->event->guest_amount : 0;
        $guestCount = ($paymentInfo->guest_count && $paymentInfo->guest_count > 0) ? $paymentInfo->guest_count : 0;

        //$guestAmount = $paymentInfo->guest_amount;

        $totalGuestAmount = $guestAmount * $guestCount;
        $ownTicketAmount = $paymentInfo->amount - $totalGuestAmount;

        $html = '
        <html> 
            <body>
                <div class="portlet-body" style="width:600px;border:1px solid #ccc">               
                                    <table style="width:600px;">                                    
                                        <tbody>
                                        <tr>
                                            <td class="title" style="width:400px;">
                                                <img name="invoicelogo" src="../images/main_logo.png" style="width:90%; width:50px;"><br/>
                                            </td>
                                            <td>
                                                Invoice #: ' . $paymentInfo->id . '<br>'
            . $paymentInfo->event->title . '<br/>
                                               Created: ' . date('d F, Y', strtotime($paymentInfo->created_at)) . '<br>                                               
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table> <br/><br/>
                                    
                                    <table style="width:600px;">
                                        <tbody>
                                        <tr>
                                            <td style="width:400px;">
                                                 <p>Address: Bagerhat Govt High School,<br>
                                                             Old Rupsha Road,Bagerhat.<br>
                                                            Email: info@exstudentsbghs.com<br/>
                                                            Phonn: +8801717963568 , +8801715442209
                                                           </p>
                                            </td>
                                            <td>
                                                ' . $paymentInfo->user->name . '<br/>';

        if ($paymentInfo->user->profession != "") {
            $html .=   $paymentInfo->user->profession . '<br/>';
        }

        $html .=  $paymentInfo->user->email . '<br/>'
            . $paymentInfo->user->phone . '  
                                                <br>  ' . $paymentInfo->user->batch . '
                                                <br>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>';

        $html .= '<div id="content">
                    <div class="invoice-box">
                        <table cellpadding="1" cellspacing="1" border="1" style="width:600px;">
                            <tbody>                      
                            <tr class="heading">
                                <td>Item</td>
                                <td>Price</td>
                            </tr>        
                            <tr class="item">
                                <td>Own Ticket</td>
                                <td>' . $ownTicketAmount . '</td>
                            </tr>';

        if ($guestCount > 0) {
            for ($i = 0; $i < $guestCount; $i++) {
                $html .= '<tr class="item">
                                            <td>Guest ' . ($i + 1) . '</td>
                                            <td>' . $paymentInfo->event->guest_amount . '</td>
                                        </tr>';
            }
        }

        $html .= '<tr class="total">
                                <td>Total</td>
                                <td>' . $paymentInfo->amount . '</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </body>
        </html>
        ';

        return $html;
    }
}
