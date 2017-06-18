@extends('layouts_user.app')
@section('title')
    Dashboard
@endsection
@section('head')
@endsection
@section('page_styles')

@endsection
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <div class="row">
                @include('shared.flash')
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-users font-dark"></i>
                                <span class="caption-subject bold uppercase"> Events Information </span>
                            </div>
                            
                        </div>
                        <div class="portlet-body">
                          sads
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
@endsection
@section('scripts')
@endsection