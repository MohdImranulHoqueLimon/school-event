@extends('admin.layouts.app')
@section('title')
    Map Dashboard
@endsection
<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_styles')
<link href="{{URL::to('/')}}/assets/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="{{URL::to('/')}}/assets/admin/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="{{URL::to('/')}}/assets/admin/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="{{URL::to('/')}}/assets/admin/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
@endsection
<!-- END PAGE LEVEL PLUGINS -->

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
                    <span>Map Dashboard</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Map Dashboard
            <small>Find out location of trucks based on orders</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <!-- BEGIN Dashboard STATS-->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="5">0</span>
                        </div>
                        <div class="desc"> Trucks Assigned </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="10/11/2016">0</span> </div>
                        <div class="desc"> date Pickup </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="11/11/2016">0</span>
                        </div>
                        <div class="desc"> Expected Delivery Date </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                    <div class="visual">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="details">
                        <div class="number"> +
                            <span data-counter="counterup" data-value="89"></span>% </div>
                        <div class="desc"> Order Status </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->

        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <!-- BEGIN REGIONAL STATS PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Regional Stats</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-cloud-upload"></i>
                            </a>
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-wrench"></i>
                            </a>
                            <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-container="false" data-placement="bottom" href="javascript:;"> </a>
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-trash"></i>
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="region_statistics_loading">
                            <img src=""{{URL::to('/')}}/assets/admin/global/img/loading.gif" alt="loading" /> </div>
                        <div id="region_statistics_content" class="display-none">
                            <div class="btn-toolbar margin-bottom-10">
                                <div class="btn-group btn-group-circle" data-toggle="buttons">
                                    <a href="" class="btn grey-salsa btn-sm active"> Users </a>
                                    <a href="" class="btn grey-salsa btn-sm"> Orders </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <a href="" class="btn btn-circle grey-salsa btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Select Region
                                        <span class="fa fa-angle-down"> </span>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;" id="regional_stat_world"> World </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" id="regional_stat_usa"> USA </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" id="regional_stat_europe"> Europe </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" id="regional_stat_russia"> Russia </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" id="regional_stat_germany"> Germany </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="vmap_world" class="vmaps display-none"> </div>
                            <div id="vmap_usa" class="vmaps display-none"> </div>
                            <div id="vmap_europe" class="vmaps display-none"> </div>
                            <div id="vmap_russia" class="vmaps display-none"> </div>
                            <div id="vmap_germany" class="vmaps display-none"> </div>
                        </div>
                    </div>
                </div>
                <!-- END REGIONAL STATS PORTLET-->
            </div>
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection

<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_scripts')
<script src="{{URL::to('/')}}/assets/admin/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
@endsection
<!-- END PAGE LEVEL PLUGINS -->