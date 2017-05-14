@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
@section('head')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <!-- END PAGE LEVEL PLUGINS -->
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
            {!! Breadcrumbs::renderIfExists('dashboard') !!}
            
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Welcome
            <small>to our Dashbord </small>
        </h1>
        @include('shared.flash')
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection
@section('scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!! Html::script('assets/admin/global/plugins/morris/morris.min.js') !!}
    {!! Html::script('assets/admin/global/plugins/morris/raphael-min.js') !!}
    {!! Html::script('assets/admin/global/plugins/counterup/jquery.waypoints.min.js') !!}
    {!! Html::script('assets/admin/global/plugins/counterup/jquery.counterup.min.js') !!}

    {!! Html::script('https://code.highcharts.com/highcharts.js') !!}
    {!! Html::script('https://code.highcharts.com/highcharts-more.js') !!}
    {!! Html::script('https://code.highcharts.com/modules/exporting.js') !!}

    {!! Html::script('assets/admin/pages/scripts/dashboard.min.js') !!}

    <!-- END PAGE LEVEL PLUGINS -->
@endsection