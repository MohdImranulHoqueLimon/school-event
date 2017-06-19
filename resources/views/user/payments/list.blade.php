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
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-newspaper-o"></i>Register Events
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form class="login-form form-horizontal" role="form" method="POST" action="{{ route('get_process_list') }}">

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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="batch" class="control-label">Select Events
                                            <span class="required" aria-required="true"> * </span>
                                        </label>
                                        <select name="batch" class="form-control">
                                            <option value=""> --- Select --- </option>
                                            @foreach($eventsList as $list)
                                            <option value="{{ $list['id'] }}">

                                            {!! $list['title'] !!}

                                        </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('batch'))
                                    <span class="help-block">
                                        {{ $errors->first('batch') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="form-actions right">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn blue"><i class="fa fa-check"></i> Continue</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    @endsection
    @section('scripts')
    @endsection