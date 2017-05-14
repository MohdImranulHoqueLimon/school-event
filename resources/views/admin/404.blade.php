@extends('admin.layouts.app')
@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! Html::style('assets/admin/global/pages/css/error.min.css') !!}
    <!-- END PAGE LEVEL STYLES -->
@endsection
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>System</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> 404
                <small></small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12 page-404">
                    <div class="number font-green"> 404 </div>
                    <div class="details">
                        <h3>Oops! You're lost.</h3>
                        <p> We can not find the page you're looking for.
                            <br/>
                            <a href="{{ route('\') }}"> Return home </a> or try the search bar below. </p>
                        <!--form action="#">
                            <div class="input-group input-medium">
                                <input type="text" class="form-control" placeholder="keyword...">
                                <span class="input-group-btn">
                                                <button type="submit" class="btn green">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                            </div-->
                            <!-- /input-group -->
                        <!--/form-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

@endsection

@section('scripts')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!--{!! Html::script('assets/admin/pages/scripts/table-datatables-responsive.min.js') !!}-->
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!! Html::script('assets/admin/global/scripts/datatable.js') !!}
    {!! Html::script('assets/admin/global/plugins/datatables/datatables.min.js') !!}
    {!! Html::script('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
    <!-- END PAGE LEVEL PLUGINS -->
@endsection