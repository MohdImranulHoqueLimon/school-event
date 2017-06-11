<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Login | {{config('app.name')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #1 for " name="description"/>
    <meta content="" name="author"/>

    {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
    {!! Html::style('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
    {!! Html::style('assets/admin/global/css/components.min.css') !!}
    {!! Html::style('assets/admin/pages/css/login.css') !!}
    {!! Html::style('assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
    <link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class=" login">
<div class="logo">
    <a href="{{url('/')}}" style="text-decoration: none;">
        <h2 class="admin-header-name" style="font-weight: bold; color: white;">School Event</h2>
    </a>
</div>

<div class="content">

    @include('errors')

    <form class="register-form" action="{{ url('/register') }}" method="post" style="display: block;" enctype="multipart/form-data">
        {{ csrf_field()  }}

        <h3 class="font-green">Sign Up</h3>
        <p class="hint"> Enter your personal details below: </p>

        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="name"/>
            @if ($errors->has('name'))
                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                <input class="form-control" placeholder="Phone Number" type="text" name="phone">
            </div>
            @if ($errors->has('phone'))
                <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <input class="form-control" placeholder="Profession" type="text" name="profession">
            @if ($errors->has('profession'))
                <span class="help-block">
                    <strong>{{ $errors->first('profession') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <select name="batch" class="form-control" required>
                <option value="">--Select Passing Year--</option>
                @for($i = date('Y'); $i >= 1947; $i--)
                    <option value="{{ $i }}">{!! $i !!}</option>
                @endfor
            </select>
            @if ($errors->has('batch'))
                <span class="help-block"><strong>{{ $errors->first('batch') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                <input class="form-control" placeholder="Email Address" type="text" name="email" onblur="emailErrorPlacement(this)">
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <?php
        $countries = \Illuminate\Support\Facades\DB::select( \Illuminate\Support\Facades\DB::raw("SELECT * FROM countries") );
        ?>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Country</label>
            <select name="country" id="country" class="form-control" required="required">
                @foreach($countries as $country)
                    <option value="{{ $country->country_name  }}">{{ $country->country_name  }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Address</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Present Address" name="address"/>
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Address</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Permanent Address" name="permanent_address"/>
            @if ($errors->has('permanent_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('permanent_address') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Present City/Town</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Present City/Town" name="city"/>
            @if ($errors->has('city'))
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>

       
        <div class="form-group ">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                     style="width: 200px; height: 150px;">
                    @if(isset($user->user_image) && $user->user_image != null)
                        <img alt="" class="" src="{{ url('/images/avatar/thumbnail_images/' . $user->user_image)}}">
                    @endif
                </div>
                <div>
                        <span class="btn red btn-outline btn-file">
                            <span class="fileinput-new"> Select image </span>
                            <span class="fileinput-exists"> Change </span>
                            <input type="file" name="user_image">
                        </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password"
                   placeholder="Password" name="password"/>
            @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="Re-type Your Password" name="rpassword"/>
            @if ($errors->has('rpassword'))
                <span class="help-block"><strong>{{ $errors->first('rpassword') }}</strong></span>
            @endif
        </div>

        <div class="form-group margin-top-20 margin-bottom-20">
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="tnc" checked/> I agree to the
                <a href="javascript:;">Terms of Service </a> &
                <a href="javascript:;">Privacy Policy </a>
                <span></span>
            </label>
            <div id="register_tnc_error"></div>
            @if ($errors->has('tnc'))
                <span class="help-block"><strong>{{ $errors->first('tnc') }}</strong></span>
            @endif
        </div>
        <div class="form-actions">
             <a class="create-account-user" style="float: left;" href="{{ url('/sign-in') }}">
               Login
            </a>
            <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
</div>
<div class="copyright">
    {{date('Y')}} © {{config('app.name')}} |
    Powered By <a class="right" href="{{ env('DOMAIN_NAME') }}" target="_blank">
        School Event
    </a>
</div>
<!--[if lt IE 9]>
{!! Html::script('assets/admin/global/plugins/respond.min.js') !!}
{!! Html::script('assets/admin/global/plugins/excanvas.min.js') !!}
{!! Html::script('assets/admin/global/plugins/ie8.fix.min.js') !!}
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
{!! Html::script('assets/admin/global/plugins/jquery.min.js') !!}
{!! Html::script('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/admin/global/plugins/js.cookie.min.js') !!}
{!! Html::script('assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/admin/global/plugins/jquery.blockui.min.js') !!}
{!! Html::script('assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! Html::script('assets/admin/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}
{!! Html::script('assets/admin/global/plugins/jquery-validation/js/additional-methods.min.js') !!}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
{!! Html::script('assets/admin/global/scripts/app.min.js') !!}
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! Html::script('assets/admin/pages/scripts/login.min.js') !!}

{!! Html::script('assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->

<script type="text/javascript">

    /*$('#country option').each(function(index){
        var option = $(this).html();
        $(this).remove();
        $('#country').prepend('<option value="' + option + '">' + option + '</option>');
    });*/

    function emailErrorPlacement(obj) {
        if($('#email-error').length > 0) {
            var email_error = '<span id="email-error" class="help-block">Please enter a valid email address.</span>';
            $('#email-error').remove();
            $(obj).parent().parent().append(email_error);
        }
    }

</script>
</body>

</html>
