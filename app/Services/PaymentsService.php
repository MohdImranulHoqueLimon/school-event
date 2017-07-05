<?php

namespace App\Services;

use App\Models\Payments;

class PaymentsService extends BaseService
{

    public function __construct(Payments $payments)
    {
        $this->model = $payments;
    }

    public function getPaymentsByUser($user_id)
    {
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

    public function getInvoiceHtml($id)
    {
        $paymentInfo = $this->model->find($id);

        $html = '
        <html> 
            <body>
                <div class="portlet-body">               
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="title" colspan="2">
                                                <img name="invoicelogo" src="images/event.png" style="width:90%; width:50px;"><br/>
                                                <img name="invoicelogo" src="images/invoice.png" style="width:90%; width:50px;">                                                
                                            </td>
                                            <td>
                                                Invoice #: ' . $paymentInfo->id . '<br>&nbsp;&nbsp;'
            . $paymentInfo->event->title . '<br/>&nbsp;
                                               Created: ' . date('d F, Y', strtotime($paymentInfo->created_at)) . '<br>
                                               Due: February 1, 2015
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table> <br/><br/>
                                    
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td colspan="2">
                                                Bagerhat Jilla School<br>
                                                335 Puraton Road<br>
                                                Sunny-villa<br>
                                                TX 12345
                                            </td>
                                            <td>
                                                ' . $paymentInfo->user->name . '<br>';

        if ($paymentInfo->user->profession != "") {
            $html .= $paymentInfo->user->profession . '</br>';
        }

        $html .=    '&nbsp;&nbsp;' . $paymentInfo->user->email . '<br>  '
                                                . $paymentInfo->user->phone . '  
                                                <br>  ' . $paymentInfo->user->batch .'
                                                <br>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>';
                                    
                       $html .= '<table style="margin-left: 40px;">
                                        <tbody>
                                        <tr>
                                            <td colspan="2">Payment Method</td>
                                            <td>Cash</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Cash</td>
                                            <td>1000</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    

                
                <div id="content">
                    <div class="invoice-box">
                        <table cellpadding="1" cellspacing="1" border=".1">
                            <tbody>                       
        
                          
        
                            <tr class="heading">
                                <td>Item</td>
                                <td>Price</td>
                            </tr>
        
                            <tr class="item">
                                <td>Website design</td>
                                <td>$300.00</td>
                            </tr>
        
                            <tr class="item">
                                <td>Hosting (3 months)</td>
                                <td>$75.00</td>
                            </tr>
        
                            <tr class="item last">
                                <td>Domain name (1 year)</td>
                                <td>$10.00</td>
                            </tr>
        
                            <tr class="total">
                                <td>Total</td>
                                <td>$385.00</td>
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
