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

                            {{ csrf_field()  }}

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <?php 
                            $events_list = array();

                            foreach($eventsPayments as $list)
                                $events_list[] = $list['event_id'];
                            ?>

                            <div class="form-body" style="margin-left: 20%">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Select Events
                                        <span class="required" aria-required="true"> * </span></label>
                                        <div class="col-sm-5">
                                          <select name="batch" class="form-control">
                                            <option value=""> --- Select --- </option>
                                            @foreach($eventsList as $list)
                                            <?php if (in_array($list['id'],$events_list)){
                                                continue;
                                            }
                                            ?>
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
                                    <div class="col-sm-4" style="margin-left: 4%">
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