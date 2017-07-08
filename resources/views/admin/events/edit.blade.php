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
                {!! Breadcrumbs::renderIfExists('events.edit') !!}
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
                                <i class="fa fa-newspaper-o"></i>Edti/Update Events
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            {!! Form::open(['url' => route('events.update', $events->id), 'method' => 'post', 'class' => 'form-horizontal panel','files'=>true]) !!}
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
                                        <input type="text" class="form-control " placeholder="Enter Events Title"
                                               name="title" value="{{$events->title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label ">
                                            Description
                                            <span class="required" aria-required="true"> * </span>
                                        </label>
                                        <textarea class="wysihtml5 form-control" name="description" rows="6"
                                                  placeholder="Events Body">{{$events->description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class=" control-label">Event Date Time
                                            <span class="required" aria-required="true"> * </span>
                                        </label><br>
                                        <input type="text" class="form-control" name="event_date" required autofocus
                                               id="event_date"
                                               value="{{ date('F d, Y h:i A', strtotime($events->event_date)) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class=" control-label">Last registration date
                                            <span class="required" aria-required="true"> * </span>
                                        </label><br>
                                        <input type="text" class="form-control" name="last_registration_date" required
                                               autofocus id="last_registration_date"
                                               value="{{ date('F d, Y', strtotime($events->last_registration_date)) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class=" control-label">Events Amount
                                            <span class="required" aria-required="true"> * </span>
                                        </label>
                                        <br>
                                        <input type="text" class="form-control" name="amount" required autofocus
                                               id="amount" value="{{$events->amount}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class=" control-label">Fixed Amount</label><br>
                                        @if ($events->fixed_amount == 1)
                                            <label class="radio-inline">
                                                <input type="radio" name="fixed_amount" id="fixed_amount" value="1"
                                                       checked> Yes
                                            </label>
                                        @else
                                            <label class="radio-inline">
                                                <input type="radio" name="fixed_amount" id="fixed_amount" value="1"> Yes
                                            </label>
                                        @endif
                                        @if ($events->fixed_amount == 0)
                                            <label class="radio-inline">
                                                <input type="radio" name="fixed_amount" id="fixed_amount1" value="0"
                                                       checked> No
                                            </label>
                                        @else
                                            <label class="radio-inline">
                                                <input type="radio" name="fixed_amount" id="fixed_amount1" value="0"> No
                                            </label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class=" control-label">Guest Allow</label><br>
                                    @if ($events->guest_allow == 1)
                                        <label class="radio-inline">
                                            <input type="radio" name="guest_allow" id="guest_allow" value="1" checked>
                                            Yes
                                        </label>
                                    @else
                                        <label class="radio-inline">
                                            <input type="radio" name="guest_allow" id="guest_allow" value="1"> Yes
                                        </label>
                                    @endif
                                    @if ($events->guest_allow == 0)
                                        <label class="radio-inline">
                                            <input type="radio" name="guest_allow" id="guest_allow1" value="0" checked>
                                            No
                                        </label>
                                    @else
                                        <label class="radio-inline">
                                            <input type="radio" name="guest_allow" id="guest_allow1" value="0"> No
                                        </label>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class=" control-label">Guest Events Amount</label>
                                <input type="text" class="form-control" name="guest_amount" id="guest_amount"
                                       value="{{$events->guest_amount}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class=" control-label">Is Active</label><br>
                                @if ($events->status == 1)
                                    <label class="radio-inline">
                                        <input type="radio" name="status" id="status" value="1" checked> Yes
                                    </label>
                                @else
                                    <label class="radio-inline">
                                        <input type="radio" name="status" id="status" value="1"> Yes
                                    </label>
                                @endif
                                @if ($events->status == 0)
                                    <label class="radio-inline">
                                        <input type="radio" name="status" id="status1" value="0" checked> No
                                    </label>
                                @else
                                    <label class="radio-inline">
                                        <input type="radio" name="status" id="status1" value="0"> No
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div style="clear: both"></div>

                        <div class="form-actions right">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('events.index')}}" class="btn default">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn blue"><i class="fa fa-check"></i> Update</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
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
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>

    <script type="text/javascript">

        $(function () {

            $('#event_date').daterangepicker({
                    locale: {
                        format: 'MMMM D, YYYY h:mm A'
                    },
                    timePicker: true,
                    singleDatePicker: true,
                    showDropdowns: true
                }
            );

            $('#last_registration_date').daterangepicker({
                    locale: {
                        format: 'MMMM D, YYYY'
                    },
                    singleDatePicker: true,
                    showDropdowns: true
                }
            );
        });
    </script>
@endsection
