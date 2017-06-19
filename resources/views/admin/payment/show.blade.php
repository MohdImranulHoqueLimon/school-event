@extends('admin.layouts.app')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                {!! Breadcrumbs::renderIfExists(Route::getCurrentRoute()->getName()) !!}
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"></h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                @include('shared.flash')

                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Details </span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <table class="table table-bordered">

                                        <tbody>
                                    <tr>
                                        <td>
                                            Title
                                        </td>
                                        <td>
                                            Description
                                        </td>
                                        <td>
                                           Date 
                                        </td>
                                    </tr>
                                            <tr>
                                                <td>
                                                 {{$newslist->title}}    
                                             </td>
                                             <td>
                                                {{$newslist->description}}
                                            </td>
                                            <td>
                                                {{$newslist->created}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>

    @include('admin.roles.permission-modal')
@endsection