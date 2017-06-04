@extends('layouts.master')

@section('title')
    Map Dashboard
@endsection

@section('css')
    <link href="{{URL::to('/')}}/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"
          rel="stylesheet" type="text/css"/>
    {{--<link href="{{URL::to('/')}}/assets/admin/pages/css/profile.min.css" rel="stylesheet" type="text/css"/>--}}

    <style type="text/css">
        .profile-menu-hint {
            padding: 10px 0px !important;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>User</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown">
                        Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="#"><i class="icon-bell"></i> Action</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-shield"></i> Another action</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-user"></i> Something else here</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="icon-bag"></i> Separated link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR -->

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h1 class="page-title" style="padding: 0px 20px 0px;">Profile | Account Information</h1>
                <div class="profile-sidebar">
                    <div class="portlet light profile-sidebar-portlet" style="margin-bottom: 1px !important;">
                        <div class="profile-userpic">
                            <img src="{{ url('/images/avatar/thumbnail_images/' . $user->user_image)}}"
                                 class="img-responsive" alt="" style="width: 30%; height: 250px">
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> {!! $user->name !!}</div>
                            <div class="profile-usertitle-job"> {!! $user->profession !!}</div>
                        </div>

                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li><a href="/" class="profile-menu-hint">
                                        <i class="icon-home"></i> Home
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="/" class="profile-menu-hint">
                                        <i class="icon-settings"></i> Account Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END PORTLET MAIN -->
                    <!-- PORTLET MAIN -->
                    <div class="portlet light ">
                        <div>
                            <h4 class="profile-desc-title">About Me</h4>
                            <span class="profile-desc-text"> Here will be the about me section limon </span>
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-globe"></i>
                                <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                            </div>
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-facebook"></i>
                                <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET MAIN -->
                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">
                            @include('flash')
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <form class="horizontal-form" role="form" method="POST"
                                          action="{{ route('profile.update', $user->id) }}"
                                          enctype="multipart/form-data">

                                        {{ csrf_field() }}
                                        {{method_field('PUT')}}

                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="form-group">
                                                    <label class="control-label">Full Name</label>
                                                    <input type="text" name="name" value="{!! $user->name !!}"
                                                           placeholder="John" class="form-control" required/>
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Batch</label>
                                                    <select name="batch" class="form-control" required>
                                                        <option value=""> --- Select ---</option>
                                                        @for($i = date('Y'); $i >= 1947; $i--)
                                                            <option value="{{ $i }}"
                                                                    @if(isset($user) && isset($user->batch) && $user->batch == $i) selected @endif>
                                                                {!! $i !!}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @if ($errors->has('batch'))
                                                        <span class="help-block">{{ $errors->first('batch') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Profession</label>
                                                    <input type="text" name="profession" required class="form-control"
                                                           value="{!! $user->profession !!}" placeholder="Teacher"/>
                                                    @if ($errors->has('profession'))
                                                        <span class="help-block">{{ $errors->first('profession') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Country</label>
                                                    <select id="country" type="text" class="form-control" name="country"
                                                            required>
                                                        <option value="">--Select Country</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country['country_name'] }}"
                                                                    @if(isset($countries) && isset($user) && $country['country_name'] == $user->country) selected @endif>
                                                                {{ $country['country_name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('country'))
                                                        <span class="help-block">{{ $errors->first('country') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Mobile Number</label>
                                                    <input type="text" name="phone" value="{!! $user->phone !!}"
                                                           placeholder="Your phone number" class="form-control"
                                                           required/>
                                                    @if ($errors->has('phone'))
                                                        <span class="help-block">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" value="{!! $user->email !!}"
                                                           required
                                                           placeholder="E-Mail Address" class="form-control"/>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" name="address" value="{!! $user->address !!}"
                                                           placeholder="Current Address" class="form-control"/>
                                                    @if ($errors->has('address'))
                                                        <span class="help-block">{{ $errors->first('address') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Permanent Address</label>
                                                    <input type="text" name="permanent_address"
                                                           value="{!! $user->permanent_address !!}"
                                                           placeholder="Present Address" class="form-control" required/>
                                                    @if ($errors->has('permanent_address'))
                                                        <span class="help-block">{{ $errors->first('permanent_address') }}</span>
                                                    @endif
                                                </div>
                                                <div class="margiv-top-10">
                                                    <input type="submit" class="btn green" value="Save Changes">
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE AVATAR TAB -->
                                            <div class="tab-pane" id="tab_1_2">
                                                {{--<form action="#" role="form">--}}
                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail"
                                                             style="width: 200px; height: 150px;">
                                                            @if(isset($user->user_image) && $user->user_image != null)
                                                                <img alt="" class=""
                                                                     src="{{ url('/images/avatar/thumbnail_images/' . $user->user_image)}}">
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 200px; max-height: 150px;">
                                                        </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="user_image" accept="image/*"> </span>

                                                            <a href="javascript:;" class="btn default fileinput-exists"
                                                               data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix margin-top-10">
                                                        <span class="label label-danger">NOTE! </span>&nbsp;
                                                        <span>Attached image with a good resulation</span>
                                                    </div>
                                                </div>
                                                <div class="margin-top-10">
                                                    <input type="submit" class="btn green" value="Submit"/>
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </div>
                                            <!-- END CHANGE AVATAR TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_3">
                                                {{--<form action="#">--}}
                                                <div class="form-group">
                                                    <label class="control-label">Current Password</label>
                                                    <input type="password" name="old_password" class="form-control"/>
                                                    @if ($errors->has('old_password'))
                                                        <span class="help-block">{{ $errors->first('old_password') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">New Password</label>
                                                    <input type="password" name="password" class="form-control"/>
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Re-type New Password</label>
                                                    <input type="password" name="retype_password" class="form-control"/>
                                                    @if ($errors->has('retype_password'))
                                                        <span class="help-block">{{ $errors->first('retype_password') }}</span>
                                                    @endif
                                                </div>
                                                <div class="margin-top-10">
                                                    <input type="submit" class="btn green" value="Change Password"/>
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </div>
                                            <!-- END CHANGE PASSWORD TAB -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
    </div>
@endsection

@section('page_scripts')
    <script src="{{URL::to('/')}}/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/pages/scripts/profile.min.js" type="text/javascript"></script>
@endsection