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

                    <div class="portlet-body">
                    <form class="login-form form-horizontal" role="form" method="POST" action="{{ route('conform_event') }}">

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

                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <h3 class="panel-title">Register For Event</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-body" style="margin-left: 20%">

                                   <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  class="control-label">Select Events  : 

                                            </label>

                                            <select name="event_id" class="form-control" required="">
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
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  class="control-label">Event Amount : 

                                            </label>

                                            <input type="number" class="form-control" name="amount" value="" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  class="control-label">Guest Amount : 

                                            </label>

                                            <input type="number" class="form-control" name="guest_amount" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  class="control-label">Guest Count : 

                                            </label>

                                            <input type="number" class="form-control" name="guest_count" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn blue"><i class="fa fa-check"></i> Conform</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </form>

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