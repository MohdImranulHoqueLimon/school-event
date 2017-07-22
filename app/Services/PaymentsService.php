<?php

namespace App\Services;

use App\Models\Payments;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PaymentsService extends BaseService
{

    public function __construct(Payments $payments)
    {
        $this->model = $payments;
    }

    public function getPaymentsByUser($user_id, $filters)
    {
        /*if(!empty($filters) && !empty($filters['event_id']) && $filters['status'] != '') {
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


        return $this->model->where('user_id', $user_id)->paginate(UtilityService::$displayRecordPerPage);*/


        $query = $this->getQuery();

        $query->where('user_id', '=', $user_id);

        if (isset($filters['event_id']) && $filters['event_id']) {
            $query->where('event_id', '=', "{$filters['event_id']}");
        }

        if (isset($filters['status']) && $filters['status'] != '') {
            $query->where('status', '=', $filters['status']);
        }

        if (isset($filters['payment_type']) && $filters['payment_type'] != '') {
            $query->where('payment_type', '=', $filters['payment_type']);
        }

        return $query->paginate(UtilityService::$displayRecordPerPage);
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

        if (isset($filters['status']) && $filters['status'] != '') {
            $query->where('status', '=', $filters['status']);
        }

        if (isset($filters['payment_type']) && $filters['payment_type'] != '') {
            $query->where('payment_type', '=', $filters['payment_type']);
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

    public function getAllSumResultsByFilter($filters) {

        $payments = $this->getAllPaymentsWithForAdmin(Auth::user()->id, $filters)->get();
        $totalAmount = 0;
        $totalGuestAmount = 0;

        foreach ($payments as $payment) {

            if(!empty($payment->amount)) $totalAmount += $payment->amount;
            if(!empty($payment->guest_amount)) $totalGuestAmount += $payment->guest_amount;
        }

        $sumResult = array (
            'total_amount' => $totalAmount,
            'total_guest_amount' => $totalGuestAmount
        );

        return $sumResult;
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
        $destinationPath = env('UPLOAD_FULL_SIZE');
        //$guestAmount = $paymentInfo->guest_amount;
        $path = url('/');
        $totalGuestAmount = $guestAmount * $guestCount;
        $ownTicketAmount = $paymentInfo->amount - $totalGuestAmount;
        if($paymentInfo->payment_type == 1){
            $payment_method = 'Bank';
        } else if($paymentInfo->payment_type == 2){
            $payment_method = 'Bkash';
        } else {
            $payment_method = 'Cash';
        }

        $html = '
        <html> 
            <body>
                <div class="portlet-body" style="width:600px;font-size:11px;">               
                                    <table style="width:600px;">                                    
                                        <tbody>
                                        <tr>
                                            <td class="title" style="width:400px;">
                                                <img name="invoicelogo" src="'.$path.'/images/main_logo.png" style="width:90%; width:50px;"><br/>
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
                                    </table>
                                    ';

        $html .= '<div id="content">
                    <div class="invoice-box">
                        <table cellpadding="2" style="width:520px;border:1px solid #ccc;border-bottom:none;border-left:none;border-right:none;margin-top:10px;border-top:none">
                            <tbody> 
                            <tr class="heading">
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none;border-top:none;">Payment Method</td>
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none;border-top:none">'.$payment_method.'</td>
                            </tr>                       
                            <tr class="heading">
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">Item</td>
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">Price</td>
                            </tr>        
                            <tr class="item">
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">Own Ticket</td>
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">' . $ownTicketAmount . '</td>
                            </tr>';

        if ($guestCount > 0) {
            for ($i = 0; $i < $guestCount; $i++) {
                $html .= '<tr class="item">
                                            <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">Guest ' . ($i + 1) . '</td>
                                            <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">' . $paymentInfo->event->guest_amount . '</td>
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

    public function getInvoiceHtmlForEmail($id)
    {
        $paymentInfo = $this->model->find($id);

        $guestAmount = ($paymentInfo->event->guest_amount && $paymentInfo->event->guest_amount > 0) ? $paymentInfo->event->guest_amount : 0;
        $guestCount = ($paymentInfo->guest_count && $paymentInfo->guest_count > 0) ? $paymentInfo->guest_count : 0;

        //$guestAmount = $paymentInfo->guest_amount;

        $totalGuestAmount = $guestAmount * $guestCount;
        $ownTicketAmount = $paymentInfo->amount - $totalGuestAmount;
        if($paymentInfo->payment_type == 1){
            $payment_method = 'Bank';
        } else if($paymentInfo->payment_type == 2){
            $payment_method = 'Bkash';
        } else {
            $payment_method = 'Cash';
        }
        $path = url('/');

        $html = '
        <html> 
            <body>
                <div class="portlet-body" style="width:600px;background-color:#F9E7E7;border-radius: 7px;border: 1px solid #ccc;">               
                                    <table style="width:600px;">                                    
                                        <tbody>
                                        <tr>
                                            <td class="title" style="width:400px;">
                                                <img name="invoicelogo" src="'.$path.'/images/main_logo.png"  style="width:90%; width:50px;"><br/>
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
                        <table cellpadding="2" style="width:600px;border:1px solid #ccc;border-bottom:none;border-left:none;border-right:none;margin-top:10px">
                            <tbody> 
                            <tr class="heading">
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">Payment Method</td>
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">'.$payment_method.'</td>
                            </tr>                       
                            <tr class="heading">
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">Item</td>
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">Price</td>
                            </tr>        
                            <tr class="item">
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">Own Ticket</td>
                                <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">' . $ownTicketAmount . '</td>
                            </tr>';

        if ($guestCount > 0) {
            for ($i = 0; $i < $guestCount; $i++) {
                $html .= '<tr class="item">
                                            <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">Guest ' . ($i + 1) . '</td>
                                            <td style="border-bottom:1px solid #ccc;border-left:none;border-right:none">' . $paymentInfo->event->guest_amount . '</td>
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
        </html>';
        return $html;
    }
}
