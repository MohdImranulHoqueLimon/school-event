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
                    
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form class="login-form form-horizontal" role="form" method="POST" action="{{ route('final_payment_list') }}">
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


                        <div class="panel panel-primary">
                          <div class="panel-heading">
                          <h3 class="panel-title">Event Information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-body process-form">

                            <div class="alert alert-success information-box" role="alert">This is payment information, you can update if you want if this is not fixed event.</div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="event_name" class="control-label">Events Name : 

                                            </label>
                                            {!! $eventsList['title'] !!}
                                             <input type="hidden" name="event_title" value="{!! $eventsList['title'] !!}">
                                              <input type="hidden" name="event_id" value="{!! $eventsList['id'] !!}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="event_name" class="control-label">Events Details : 

                                            </label>
                                            {!! $eventsList['description'] !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  class="control-label">Event Amount : 

                                            </label>
                                            {!! $eventsList['amount'] !!}
                                            <input type="hidden" name="amount" value="{!! $eventsList['amount'] !!}">
                                        </div>
                                    </div>
                                </div>

                                <?php if($eventsList['title'] == 0){ ?>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="batch" class="control-label">Update Event Amount

                                            </label>
                                            <input type="number" class="form-control" min="{!! $eventsList['amount'] !!}" placeholder="Enter Events Amount" name="new_amount" value="{!! $eventsList['amount'] !!}" required autofocus>

                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                                <?php if($eventsList['guest_allow'] == 1){ ?>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  class="control-label">Single Guest Amount : 

                                            </label>
                                            {!! $eventsList['guest_amount'] !!}
                                             <input type="hidden" name="guest_amount" value="{!! $eventsList['guest_amount'] !!}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="batch" class="control-label">Guest Count

                                            </label>
                                            <input type="number" class="form-control" min="1" placeholder="Enter Guest Number" name="guest_count" value="">

                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>
                            <div class="form-actions right">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn blue"><i class="fa fa-check"></i> Continue</button>
                                    </div>
                                </div>
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