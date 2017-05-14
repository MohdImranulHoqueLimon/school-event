@extends('admin.layouts.app')
@section('title')
    Create State
@endsection

@section('head')

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
                {!! Breadcrumbs::renderIfExists(Route::getCurrentRoute()->getName()) !!}

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"></h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> edit </span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>

                        <div class="portlet-body">

                            <form class="form-group" role="form" method="POST"
                                  action="{{ route('states.update',$stateDetails->id) }}">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">State Name
                                        <span class="required" aria-required="true"> * </span>
                                    </label>

                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{$stateDetails->name}}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="country_id" class="control-label">Country
                                        <span class="required" aria-required="true"> * </span>
                                    </label>

                                    <div class="input-group">
                                        <select class="form-control" name="country_id" required autofocus>
                                            <option value="">Select</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{ $stateDetails->country_id == $country->id?'selected':null}}> {{$country->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('country_id'))
                                            <span class="help-block"><strong>{{ $errors->first('country_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    @endsection

            <!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_scripts')

    @endsection
            <!-- END PAGE LEVEL PLUGINS -->