@extends('admin.layouts.app')
@section('head')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!! Html::style('assets/admin/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') !!}
    {!! Html::style('assets/admin/global/plugins/datatables/datatables.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
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
                {!! Breadcrumbs::renderIfExists('testimonials.edit') !!}
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
                                            <i class="glyphicon glyphicon-tasks"></i>Add Testimonial
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        {!! Form::open(['url' => route('testimonials.update', $testimonial->id), 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class=" control-label">
                                                                Client
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <input type="text" class="form-control " placeholder="Enter Client Name" name="testimonial_client" value="{{$testimonial->testimonial_client}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class=" control-label">
                                                                Designation
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <input type="text" class="form-control " placeholder="Enter Designation" name="testimonial_designation" value="{{$testimonial->testimonial_designation}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class=" control-label">
                                                                Company
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <input type="text" class="form-control " placeholder="Enter Company" name="testimonial_company" value="{{$testimonial->testimonial_company}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="control-label ">
                                                            Description
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <textarea class="wysihtml5 form-control" name="testimonial_body" rows="6" placeholder="Testimonial Body">{{$testimonial->testimonial_body}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class=" control-label">Is Active</label><br>
                                                    @if ($testimonial->is_active == 1)
                                                            <label class="radio-inline">
                                                                <input type="radio" name="is_active" id="is_active1" value="1" checked> Yes
                                                            </label>
                                                        @else
                                                            <label class="radio-inline">
                                                                <input type="radio" name="is_active" id="is_active1" value="1" > Yes
                                                            </label>
                                                        @endif
                                                        @if ($testimonial->is_active == 0)
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
                                            <div class="form-actions right">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="{{route('testimonials.index')}}" class="btn default" >
                                                            Cancel
                                                        </a>
                                                        <button type="submit" class="btn blue"><i class="fa fa-check"></i> Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
    {!! Html::script('assets/admin/pages/scripts/components-form-tools.min.js') !!}
    {!! Html::script('assets/admin/pages/scripts/components-editors.min.js') !!}
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection