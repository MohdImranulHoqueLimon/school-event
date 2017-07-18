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
                                    <form class="horizontal-form" role="form" method="GET" action="/admin/payments">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="event_id" class="control-label">Events</label>
                                                    <select name="event_id" class="form-control">
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

                                            <div class="col-lg-2 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="" @if(!isset($request) || $request->status == '') @endif> --- Select --- </option>
                                                        @for($i = 0; $i < 3; $i++)
                                                            <option value="{{$i}}" @if(isset($request) && $request->status != '' && $request->status == $i) selected @endif>
                                                                {{\App\Support\Configs\Constants::$payment_status_names[$i]}}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Name</label>
                                                    <input id="name" type="text" class="form-control" name="name"
                                                           value="{{ $request->get('name') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
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
                                        <th style="min-width: 90px;">Bkash Code</th>
                                        <th style="min-width: 120px;">Attachment</th>
                                        <th style="min-width: 120px;">Approved By</th>
                                        <th style="min-width: 80px;">Status</th>
                                        <th style="min-width: 180px; text-align: center;"> Actions</th>
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
                                                @if($payment->payment_method->title)
                                                    {{$payment->payment_method->title}}
                                                @else N/A
                                                @endif
                                            </td>
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
                                                <a href="{{ route('admin.invoice', $payment->id) }}" title="View Invoice" style="float: left"
                                                   class="btn btn-icon-only grey-cascade">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                @if($payment->status === 1)
                                                    <a href="{{ route('admin.pending_payment', $payment->id) }}" title="Pending" style="float: left"
                                                       class="btn btn-icon-only grey-cascade">
                                                        <i class="fa fa-pause"></i>
                                                    </a>
                                                @elseif($payment->status === 0)
                                                    <a href="{{ route('admin.approve_payment', $payment->id) }}" title="Approved" style="float: left"
                                                       class="btn btn-icon-only grey-cascade">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                @endif

                                                <a href="{{ route('admin.cancel_payment', $payment->id) }}" title="Cancle" style="float: left"
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
