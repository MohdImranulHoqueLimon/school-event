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
                            <div class="actions">
                                <div class="btn-group pull-right">
                                    <a href="{{route('events.create')}}" class="btn sbold green">Add
                                        Events <i class="fa fa-plus"></i></a>
                                </div>
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
                                            <div class="col-md-2">
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
                                                    <label for="name" class="control-label">Name</label>
                                                    <input id="name" type="text" class="form-control" name="name"
                                                           value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email/Username</label>
                                                    <input id="email" type="text" class="form-control" name="email" value="">
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

                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                   id="sample_1" width="100%">
                                <thead>
                                <tr>
                                    <th width="18%"> User</th>
                                    <th width="20"> Event</th>
                                    <th width="8%"> Quantity</th>
                                    <th width="9%">T. Amount</th>
                                    <th width="9%">G. Amount</th>
                                    <th width="10%"> Created</th>
                                    <th width="16%"> Approved By</th>
                                    <th width="10%">Status</th>
                                    <th width="13%" style="text-align: center;"> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    <tr class="odd gradeX">
                                        <td>{{$payment->user->name}}</td>
                                        <td>{{$payment->event->title}}</td>
                                        <td>{{$payment->quantity}}</td>
                                        <td>{{$payment->amount}}</td>
                                        <td>
                                            @if($payment->guest_amount === null)
                                                N/A
                                            @else
                                                {{$payment->guest_amount}}
                                            @endif
                                        </td>
                                        <td class="center">{{ date('d M, Y', strtotime($payment->created_at)) }}</td>
                                        <td>
                                            @if($payment->approved_admin && $payment->approved_admin->name)
                                                {{$payment->approved_admin->name}}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>@if($payment->status === 1) Approved @else Pending @endif</td>
                                        <td>
                                            @if($payment->status === 1)
                                            <a href="{{ route('admin.pending_payment', $payment->id) }}" style="float: left"
                                               class="btn btn-icon-only grey-cascade">
                                                <i class="fa fa-pause"></i>
                                            </a>
                                            @elseif($payment->status === 0)
                                                <a href="{{ route('admin.approve_payment', $payment->id) }}" style="float: left"
                                                   class="btn btn-icon-only grey-cascade">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            @endif

                                            <a href="{{ route('admin.cancel_payment', $payment->id) }}" style="float: left"
                                               class="btn btn-icon-only grey-cascade">
                                                <i class="fa fa-ban"></i>
                                            </a>

                                            <form method="POST" class="form-inline" action="{{route('admin.payment', $payment->id)}}" onsubmit="return confirm('Are you sure?')">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-icon-only btn-danger"><i class="fa fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
