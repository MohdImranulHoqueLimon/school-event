@extends('layouts_user.app')
@section('title')
    Invoice
@endsection
@section('page_styles')

@endsection

<style type="text/css">
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
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
                                    {{--<button id="cmd" class="btn sbold green">Download PDF</button>--}}
                                    <a target="_blank" class="btn sbold green" href="{{ route('user.invoice_download', $paymentInfo->id)  }}" >Download PDF</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        $guestAmount = ($paymentInfo->event->guest_amount && $paymentInfo->event->guest_amount > 0) ? $paymentInfo->event->guest_amount : 0;
                        $guestCount = ($paymentInfo->guest_count && $paymentInfo->guest_count > 0) ? $paymentInfo->guest_count : 0;

                        $totalGuestAmount = $guestAmount * $guestCount;
                        $ownTicketAmount = $paymentInfo->amount - $totalGuestAmount;
                        ?>
                        <div class="portlet-body">
                            <div id="content">
                                <div class="invoice-box">
                                    <table cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr class="top">
                                            <td colspan="2">
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td class="title">
                                                            <img name="invoicelogo" src="{{ url('/images/main_logo.png')}}" style="width:60%; max-width:120px;">
                                                            <img name="invoicelogo" src="{{ url('/images/invoice.png')}}" style="width:50%; max-width:45px;">
                                                        </td>
                                                        <td>
                                                            Invoice #: {{$paymentInfo->id}}<br>
                                                            {{$paymentInfo->event->title}}<br/>
                                                            Created: {{ date('d F, Y', strtotime($paymentInfo->created_at)) }}
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr class="information">
                                            <td colspan="2">
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            {{--Bagerhat Jilla School<br>
                                                            335 Puraton Road<br>
                                                            Sunny-villa<br>
                                                            TX 12345--}}
                                                        </td>
                                                        <td>
                                                            {{$paymentInfo->user->name}}<br>
                                                            @if($paymentInfo->user->profession != '') {{$paymentInfo->user->profession}}
                                                            <br> @endif
                                                            <i class="fa fa-envelope"></i> {{$paymentInfo->user->email}}
                                                            <br>
                                                            <i class="fa fa-phone"></i> {{$paymentInfo->user->phone}}
                                                            <br>
                                                            <i class="fa fa-graduation-cap"></i> {{$paymentInfo->user->batch}}
                                                            <br>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr class="heading">
                                            <td>Payment Method</td>
                                            <td>Cash #</td>
                                        </tr>

                                        <tr class="details">
                                            <td>Cash</td>
                                            <td>{{ $paymentInfo->amount }}</td>
                                        </tr>

                                        <tr class="heading">
                                            <td>Item</td>
                                            <td>Price</td>
                                        </tr>

                                        <tr class="item">
                                            <td>Own Ticket</td>
                                            <td> {{ $ownTicketAmount }}</td>
                                        </tr>

                                        @if($guestCount > 0)
                                            @for($i = 0; $i < $guestCount; $i++)
                                                <tr class="item">
                                                    <td>Guest {{ ($i + 1) }} </td>
                                                    <td> {{ $paymentInfo->event->guest_amount }} </td>
                                                </tr>
                                            @endfor
                                        @endif

                                        <tr class="total">
                                            <td></td>
                                            <td>Total: {{ $paymentInfo->amount }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="editor"></div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script>
        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };

        $('#cmd').click(function () {
            doc.fromHTML($('#content').html(), 5, 0, {
                'width': 500,
                'elementHandlers': specialElementHandlers
            });
            doc.save('sample-file.pdf');
        });

    </script>
@endsection


