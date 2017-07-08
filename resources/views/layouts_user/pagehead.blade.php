<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>{{config('app.name')}}</title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/android-icon-36x36.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/android-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/android-icon-144x144.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
    {!! Html::style('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    {!! Html::style('assets/admin/global/css/components.min.css') !!}

    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    {!! Html::style('assets/admin/layouts/layout/css/layout.min.css') !!}
    {!! Html::style('assets/admin/layouts/layout/css/themes/darkblue.min.css') !!}
    {!! Html::style('assets/admin/layouts/layout/css/custom.css') !!}

    {!! Html::style('assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />

    <style>
        .ui-autocomplete-loading {
            background: white url("{{ asset('assets/admin/global/img/loading-spinner-blue.gif') }}") right center no-repeat;

        }
    </style>
    @yield('head')
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
