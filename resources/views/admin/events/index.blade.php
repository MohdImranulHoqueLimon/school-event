@extends('admin.layouts.app')
@section('title')
    Events
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
                                <span class="caption-subject bold uppercase"> Events </span>
                            </div>
                            <div class="actions">
                                <div class="btn-group pull-right">
                                    <a href="{{route('events.create')}}" class="btn sbold green">Add
                                        Events <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                   id="sample_1" width="100%">
                                <thead>
                                <tr>
                                    <th width="25%"> Title</th>
                                    <th width="33%"> Description</th>
                                    <th width="5%">Amount</th>
                                    <th width="5%">Guest</th>
                                    <th width="7%">G. Amount</th>
                                    <th width="10%"> Created</th>
                                    <th width="10%" style="text-align: center;"> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events_list as $events)
                                    <tr class="odd gradeX">
                                        <td>{{$events->title}}</td>
                                        <td>{{$events->description}}</td>
                                        <td>{{$events->amount}}</td>
                                        <td>{{$events->guest_allow == 1 ? 'Yes' : 'No'}}</td>
                                        <td>{{$events->guest_amount}}</td>
                                        <td class="center">{{ date('d M, Y', strtotime($events->created_by)) }}</td>
                                        <td style="text-align: center;">
                                            <form style="float:right;" method="POST" class="form-inline" action="{{route('events.destroy', $events->id)}}" onsubmit="return confirm('Are you sure?')">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                <a href="{{ route('events.edit', $events->id) }}"
                                                   class="btn btn-icon-only btn-primary"><i class="fa fa-edit"></i></a>
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
