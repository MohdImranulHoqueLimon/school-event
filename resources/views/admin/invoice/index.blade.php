@extends('admin.layouts.app')
@section('title')
    Invoice
@endsection
@section('page_styles')

@endsection

<style type="text/css">
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }

    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }

    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }

    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }

    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }

    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }

    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }

    .invoice-box table tr.details td{
        padding-bottom:20px;
    }

    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }

    .invoice-box table tr.item.last td{
        border-bottom:none;
    }

    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }

        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
</style>

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <h1 class="page-title"></h1>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-users font-dark"></i>
                                <span class="caption-subject bold uppercase"> Invoice </span>
                            </div>
                            <div class="actions">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('users.create') }}" class="btn sbold green">Download PDF</a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="invoice-box">
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="top">
                                        <td colspan="2">
                                            <table>
                                                <tr>
                                                    <td class="title">
                                                        <img src="http://nextstepwebs.com/images/logo.png" style="width:100%; max-width:300px;">
                                                    </td>
                                                    <td>
                                                        Invoice #: {{$paymentInfo->id}}<br>
                                                        Created: {{ date('d F, Y', strtotime($paymentInfo->created_at)) }}<br>
                                                        Due: February 1, 2015
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr class="information">
                                        <td colspan="2">
                                            <table>
                                                <tr>
                                                    <td>
                                                        Bagerhat Jilla School<br>
                                                        335 Puraton Road<br>
                                                        Sunny-villa<br>
                                                        TX 12345
                                                    </td>
                                                    <td>
                                                        {{$paymentInfo->user->name}}<br>
                                                        @if($paymentInfo->user->profession != '') {{$paymentInfo->user->profession}}<br> @endif
                                                        <i class="fa fa-envelope"></i> {{$paymentInfo->user->email}}<br>
                                                        <i class="fa fa-phone"></i> {{$paymentInfo->user->phone}}<br>
                                                        <i class="fa fa-graduation-cap"></i> {{$paymentInfo->user->batch}}<br>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr class="heading">
                                        <td>Payment Method</td>
                                        <td>Cash #</td>
                                    </tr>

                                    <tr class="details">
                                        <td>Cash</td>
                                        <td>1000</td>
                                    </tr>

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
                                        <td></td>
                                        <td>Total: $385.00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection


