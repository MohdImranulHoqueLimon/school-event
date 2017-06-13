@extends('admin.layouts.app')
@section('head')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!! Html::style('assets/admin/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') !!}
    {!! Html::style('assets/admin/global/plugins/datatables/datatables.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
    {!! Html::style('assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
    {!! Html::style('assets/admin/global/css/components.min.css') !!}
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
                            {!! Breadcrumbs::renderIfExists('news.edit') !!}
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
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-newspaper-o"></i>Edti/Update Newssticker
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                   {!! Form::open(['url' => route('newssticker.update', $newslist->id), 'method' => 'post', 'class' => 'form-horizontal panel','files'=>true]) !!}
                                        {{method_field('PUT')}}
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-body">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label class=" control-label">
                                                        Title
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="text" class="form-control " placeholder="Enter News Title" name="title" value="{{$newslist->title}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label ">
                                                        Description
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <textarea class="wysihtml5 form-control" name="description" rows="6" placeholder="Newssticker Body">{{$newslist->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class=" control-label">Is Active</label><br>
                                                @if ($newslist->is_active == 1)
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_active" id="is_active1" value="1" checked> Yes
                                                        </label>
                                                    @else
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_active" id="is_active1" value="1" > Yes
                                                        </label>
                                                    @endif
                                                    @if ($newslist->is_active == 0)
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_active" id="is_active2" value="0" checked> No
                                                        </label>
                                                    @else
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_active" id="is_active2" value="0"> No
                                                        </label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class=" control-label">Is Active</label><br>
                                                @if ($newslist->is_active_global == 1)
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_active_global" id="is_active_global" value="1" checked> Yes
                                                        </label>
                                                    @else
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_active_global" id="is_active_global" value="1" > Yes
                                                        </label>
                                                    @endif
                                                    @if ($newslist->is_active == 0)
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_active_global" id="is_active_global1" value="0" checked> No
                                                        </label>
                                                    @else
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_active_global" id="is_active_global1" value="0"> No
                                                        </label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions right">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="{{route('newssticker.index')}}" class="btn default" >
                                                        Cancel
                                                    </a>
                                                    <button type="submit" class="btn blue"><i class="fa fa-check"></i> Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
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
    {!! Html::script('assets/admin/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') !!}
    {!! Html::script('assets/admin/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') !!}
    {!! Html::script('assets/admin/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js') !!}
    {!! Html::script('assets/admin/global/plugins/autosize/autosize.min.js') !!}
    {!! Html::script('assets/admin/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}
    {!! Html::script('assets/admin/pages/scripts/components-form-tools.min.js') !!}
    {!! Html::script('assets/admin/pages/scripts/components-editors.min.js') !!}
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
