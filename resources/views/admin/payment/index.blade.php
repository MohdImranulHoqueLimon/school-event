@extends('admin.layouts.app')
@section('title')
    Payments
@endsection
@section('page_styles')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{URL::to('/')}}/assets/admin/global/plugins/datatables/datatables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{URL::to('/')}}/assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
          rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar"></div>
            <h1 class="page-title"></h1>
            <div class="row">
                @include('shared.flash')
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Payments </span>
                            </div>
                            
                        </div>
                        <div class="portlet-body">

                            <div class="portlet green-sharp box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-search"></i>Search Users
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <form class="horizontal-form" role="form" id="search_form" method="GET" action="/admin/payments">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="event_id" class="control-label">Events</label>
                                                    <select name="event_id" id="event_id" class="form-control">
                                                        <option value=""> --- Select --- </option>
                                                        @foreach($events as $event)
                                                            <option value="{{ $event->id }}"
                                                                    @if(isset($request) && $request->event_id == $event->id) selected @endif>
                                                                {!! $event->title !!}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Status</label>
                                                    <select name="status" id="name" class="form-control">
                                                        <option value="" @if(!isset($request) || $request->status == '') @endif> --- Select --- </option>
                                                        @for($i = 0; $i < 3; $i++)
                                                            <option value="{{$i}}" @if(isset($request) && $request->status != '' && $request->status == $i) selected @endif>
                                                                {{\App\Support\Configs\Constants::$payment_status_names[$i]}}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="payment_type" class="control-label">Payment Type</label>
                                                    <select name="payment_type" id="payment_type" class="form-control">
                                                        <option value=""> --- Select ---</option>
                                                        <option value="1" @if(isset($request) && $request->payment_type == 1) selected @endif>Bank</option>
                                                        <option value="2" @if(isset($request) && $request->payment_type == 2) selected @endif>Bkash</option>
                                                        <option value="3" @if(isset($request) && $request->payment_type == 3) selected @endif>Cash</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Name</label>
                                                    <input id="name" type="text" class="form-control" name="name"
                                                           value="{{ $request->get('name') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email/Username
                                                    </label>
                                                    <input id="email" type="text" class="form-control" name="email" value="{{ $request->get('email') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-12 col-sm-12 pull-right">
                                                <label for="condition" class="control-label">&nbsp;</label><br/>
                                                <button type="submit" class="btn blue btn-block">
                                                    <i class="fa fa-search"></i> Search
                                                </button>

                                                <button type="button" class="btn blue btn-block" onclick="downloadCsv()">
                                                    <i class="fa fa-download"></i> CSV
                                                </button>
                                            </div>


                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div style="overflow-x: scroll;">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                       id="sample_1" style="overflow-x: scroll !important; min-width: 1300px !important;">
                                    <thead>
                                    <tr>
                                        <th style="min-width: 165px;">User</th>
                                        <th style="min-width: 165px;">Event</th>
                                        <th style="min-width: 80px;">Amount</th>
                                        <th style="min-width: 80px;">G. Amount</th>
                                        <th style="min-width: 80px;">T. Amount</th>
                                        <th style="min-width: 80px;">G. Count</th>
                                        <th style="min-width: 95px;">Created</th>
                                        <th style="min-width: 90px;">Payment Type</th>
                                        <th style="min-width: 90px;">Cash Receiver</th>
                                        <th style="min-width: 90px;">Bkash Code</th>
                                        <th style="min-width: 120px;">Attachment</th>
                                        <th style="min-width: 120px;">Approved By</th>
                                        <th style="min-width: 80px;">Status</th>
                                        <th style="min-width: 225px; text-align: center;"> Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)

                                        <?php
                                        $guestAmount = ($payment->event->guest_amount && $payment->event->guest_amount > 0) ? $payment->event->guest_amount : 0;
                                        $guestCount = ($payment->guest_count && $payment->guest_count > 0) ? $payment->guest_count : 0;

                                        $totalGuestAmount = $guestAmount * $guestCount;
                                        $ownTicketAmount = $payment->amount - $totalGuestAmount;
                                        ?>

                                        <tr class="odd gradeX">
                                            <td>{{$payment->user->name}}</td>
                                            <td>{{$payment->event->title}}</td>
                                            <td>{{$ownTicketAmount}}</td>
                                            <td>
                                                @if($totalGuestAmount === 0)
                                                    N/A
                                                @else
                                                    {{ $totalGuestAmount }}
                                                @endif
                                            </td>
                                            <td>{{$payment->amount}}</td>
                                            <td> @if($payment->guest_count) {{$payment->guest_count }} @else N/A @endif</td>
                                            <td class="center">{{ date('d M, Y', strtotime($payment->created_at)) }}</td>
                                            <td>
                                               {{-- @if($payment->payment_type && $payment->payment_method->title)
                                                    {{$payment->payment_method->title}}
                                                @else N/A
                                                @endif--}}
                                                @if($payment->payment_type != NULL && $payment->payment_type == 1) Bank

                                                @elseif($payment->payment_type != NULL && $payment->payment_type == 2)
                                                    Bkash
                                                @elseif($payment->payment_type != NULL && $payment->payment_type == 3)
                                                    Cash
                                                @else N/A
                                                @endif
                                            </td>
                                            <td>{{ $payment->cash_note  }}</td>
                                            <td>{{ $payment->bkash_code  }}</td>
                                            <td>
                                                <a target="_blank" href="../upload/payment/{{ $payment->bank_attachment  }}">{{ $payment->bank_attachment  }}</a>
                                            </td>
                                            <td>
                                                @if($payment->approved_admin && $payment->approved_admin->name)
                                                    {{$payment->approved_admin->name}}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($payment->status === 1)
                                                    Approved
                                                @elseif($payment->status === 0)
                                                    Pending
                                                @else Suspend
                                                @endif</td>
                                            <td style="width: 150px !important;">

                                                <a href="#" style="float: left" data-toggle="modal" data-target="#exampleModal"
                                                   class="btn btn-icon-only grey-cascade" onclick="setPaymentId({{$payment->id}})">
                                                    <i class="fa fa-dollar"></i>
                                                </a>

                                                <a href="{{ route('admin.invoice', base64_encode($payment->id)) }}" title="View Invoice" style="float: left"
                                                   class="btn btn-icon-only grey-cascade">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                @if($payment->status === 1)
                                                    <a href="{{ route('admin.pending_payment', $payment->id) }}" onclick="return confirm('Are you sure to want Pending?')" title="Pending" style="float: left"
                                                       class="btn btn-icon-only grey-cascade">
                                                        <i class="fa fa-pause"></i>
                                                    </a>
                                                @elseif($payment->status === 0)
                                                    <a href="{{ route('admin.approve_payment', $payment->id) }}" onclick="return confirm('Are you sure to want approved?')" title="Approved" style="float: left"
                                                       class="btn btn-icon-only grey-cascade">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                @endif

                                                <a href="{{ route('admin.cancel_payment', $payment->id) }}" onclick="return confirm('Are you sure to want cancle?')" title="Cancle" style="float: left"
                                                   class="btn btn-icon-only grey-cascade">
                                                    <i class="fa fa-ban"></i>
                                                </a>

                                                <form method="POST" class="form-inline" action="{{route('admin.payment', $payment->id)}}" onsubmit="return confirm('Are you sure?')">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-icon-only btn-danger" title="Delete"><i class="fa fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="1"><b>Total Amount: </b> {{ $sumResults['total_amount'] }}</td>
                                        <td colspan="2"><b>Total Guest Amount: </b> {{ $sumResults['total_guest_amount'] }}</td>
                                        <td colspan="9"><b>Total Own Amount: </b> {{ $sumResults['total_amount'] - $sumResults['total_guest_amount'] }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            {!! CHTML::customPaginate($payments,'') !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="horizontal-form" role="form" id="payment_type_form"
                          action="{{ route('update_payment_type')  }}"
                          enctype="multipart/form-data" method="POST">

                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <input type="hidden" name="id" id="payment_id" value=""/>

                        <div class="row">
                            <div class="col-md-offset-3 col-md-5">
                                <div class="form-group">
                                    <label for="payment_type" class="control-label">Payment Type</label>
                                    <select name="payment_type" class="form-control" onchange="setPaymentMethod(this)">
                                        <option value=""> --- Select --- </option>
                                        @foreach($paymentTypes as $paymentType)
                                            <option value="{{ $paymentType->id }}">{!! $paymentType->title !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-5" id="attachment_section" style="display: none;">
                                <div class="form-group">
                                    <label for="name" class="control-label">Bank Attachment</label>
                                    <input type="file" name="bank_attachment" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-offset-3 col-md-5" id="bkash_section" style="display: none;">
                                <div class="form-group">
                                    <label for="name" class="control-label">Bkash Code</label>
                                    <input type="text" name="bkash_code" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="submitPaymentTypeForm()">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function setPaymentMethod(obj) {

            var selectedMethod = $(obj).val();

            $('#attachment_section').hide();
            $('#bkash_section').hide();

            if(selectedMethod == 1) {
                $('#attachment_section').show();
            }
            if(selectedMethod == 2) {
                $('#bkash_section').show();
            }
        }

        function submitPaymentTypeForm() {
            $('#payment_type_form').submit();
        }

        function setPaymentId(id) {
            $('#payment_id').val(id);
        }


            function downloadCsv() {

                $('#search_form').append('<input type="hidden" name="csv" value="1"/>');
                $('#search_form').submit();

                /*$(
                        '<form action="download_csv_report">' +
                                '<input type="hidden" name="event_id" value="' + $('#event_id').val() + '"/>'
                                '<input type="hidden" name="status" value="' + $('#status').val() + '"/>'
                                '<input type="hidden" name="payment_type" value="' + $('#payment_type').val() + '"/>'
                                '<input type="hidden" name="name" value="' + $('#name').val() + '"/>'
                                '<input type="hidden" name="email" value="' + $('#email').val() + '"/>'
                        '</form>'
                ).appendTo('body').submit();*/
            }

    </script>

@endsection
@section('page_scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{URL::to('/')}}/assets/admin/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/global/plugins/datatables/datatables.min.js"
            type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
@endsection


@section('page_scripts2')
    <script src="{{URL::to('/')}}/assets/admin/pages/scripts/table-datatables-managed.min.js"
            type="text/javascript"></script>
@endsection
