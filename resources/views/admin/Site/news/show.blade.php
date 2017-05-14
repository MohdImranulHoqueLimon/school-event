@extends('admin.layouts.app')
@section('head')
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		{!! Html::style('assets/admin/global/plugins/datatables/datatables.min.css') !!}
		{!! Html::style('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
		<!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('content')
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            {!! Breadcrumbs::renderIfExists('news.show') !!}
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">
                            <small></small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                            <div class="caption font-dark">
                                                <i class="fa fa-newspaper-o"></i>
                                                <span class="caption-subject bold uppercase">News</span>
                                                        <span class="caption-helper font-white-haze">Details info...</span>
                                                <div class="row pull-right">
                                                    <a href="{{route('news.edit',$news->id)}}" class="btn btn-primary green">
                                                        <i class="glyphicon glyphicon-pencil"></i> Edit
                                                    </a>
                                                    <a href="{{route('news.index')}}" class="btn btn-danger" >
                                                        <i class="glyphicon glyphicon-hand-left"></i> Back
                                                    </a>
                                                </div>
                                            </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                        <div class="form-body">
                                                            <h2 class="margin-bottom-20"> View News Info - {{$news->news_title}} </h2>
                                                            <h3 class="form-section">News Info</h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            @if(File::isFile( 'images/thumbnail_images/'.$news->news_image ))
                                                                                <p class="form-control-static"> {{ HTML::image('images/thumbnail_images/'.$news->news_image) }} </p>
                                                                            @else
                                                                                <p class="form-control-static"> {{ HTML::image('images/logo.png') }} </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <p class="form-control-static"> {!! $news->news_body !!} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                            <!--/row-->
                                                            <h3 class="form-section">Oparetion Info</h3>
                                                            <div class="row even">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Create:</label>
                                                                        <div class="col-md-9">
                                                                            <p class="form-control-static"> {{$news->createdBy->name}} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Date:</label>
                                                                        <div class="col-md-9">
                                                                            <p class="form-control-static"> {{ $news->created_at->format(config('app.date_format')) }} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                            <!--/row-->
                                                            <h3 class="form-section"></h3>
                                                            <div class="row odd">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Update:</label>
                                                                        <div class="col-md-9">
                                                                            <p class="form-control-static"> {{$news->updatedBy->name}} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Date:</label>
                                                                        <div class="col-md-9">
                                                                            <p class="form-control-static"> {{ $news->updated_at->format(config('app.date_format')) }} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                        </div>
                                                    <!-- END FORM-->
                                                </div>
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
		{!! Html::script('assets/admin/pages/scripts/form-samples.min.js') !!}
		<!-- END PAGE LEVEL SCRIPTS -->
@endsection