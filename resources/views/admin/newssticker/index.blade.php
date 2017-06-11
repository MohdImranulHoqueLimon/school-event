@extends('admin.layouts.app')
@section('title')
    Newsticker
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
                                <span class="caption-subject bold uppercase"> Newssticker </span>
                            </div>
                            <div class="actions">
                                <div class="btn-group pull-right">
                                    <a href="{{route('newssticker.create')}}" class="btn sbold green">Add
                                        New <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                   id="sample_1" width="100%">
                                <thead>
                                <tr>
                                    <th width="30%"> Title</th>
                                    <th width="38%"> Description</th>
                                    <th width="15%"> Created</th>
                                    <th width="15%"> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newsstickers as $newssticker)
                                    <tr class="odd gradeX">
                                        <td>{{$newssticker->title}}</td>
                                        <td>{{$newssticker->description}}</td>
                                        <td class="center">{{ date('d M, Y', strtotime($newssticker->created_at)) }}</td>
                                        <td>
                                            <form style="float:right;" method="POST" class="form-inline" action="{{route('newssticker.destroy', $newssticker->id)}}" onsubmit="return confirm('Are you sure?')">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                <a href="{{ route('newssticker.show', $newssticker->id) }}"
                                                   class="btn btn-icon-only grey-cascade">
                                                    <i class="fa fa-eye"></i></a>
                                                <a href="{{ route('newssticker.edit', $newssticker->id) }}"
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
