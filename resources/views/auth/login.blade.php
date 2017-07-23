<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Login | {{config('app.name')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #1 for " name="description"/>
    <meta content="" name="author"/>
    <link rel="shortcut icon" href="{{ url('') }}/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ url('') }}/images/android-icon-36x36.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('') }}/images/android-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/{{ url('') }}images/android-icon-144x144.png">


    {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
    {!! Html::style('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
    {!! Html::style('assets/admin/global/css/components.min.css') !!}
    {!! Html::style('assets/admin/pages/css/login.css') !!}
    {!! Html::style('assets/home-page.css') !!}
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<body class=" login">
<!-- <div class="logo">
    <a href="{{url('/')}}" style="text-decoration: none;">
        <h2 class="admin-header-name" style="font-weight: bold; color: white;">School Event</h2>
    </a>
</div> -->

<nav id="menu" class="navbar navbar-default navbar-fixed-top" style="padding-bottom: 10px;padding-top: 10px;">
     <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand page-scroll" href="#page-top"> <a class="navbar-brand page-scroll" href="{{ url('') }}"><img src="images/main_logo.png" style="height: 62px;margin-top: -20px"></a>
 </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                 @if (Route::has('login'))
                    @if(!Auth::check())
                        <li><a href="{{ url('/sign-in') }}" class="page-scroll">Login</a></li>
                        <li><a href="{{ url('/register') }}" class="page-scroll">Register</a></li>
                        <li><a href="{{ url('/how_to_complete') }}" class="page-scroll">How to complete registration</a></li>
                    @else
                        <li><a href="{{ url('user/profile') }}" class="page-scroll">Profile</a></li>
                        <li><a href="{{ url('/logout') }}" class="page-scroll">Logout</a></li>
                    @endif
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>

<div class="content" style="margin-top: 100px">
    <form class="login-form form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        <h3 class="form-title font-green">Sign In</h3>
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone" class="col-md-12 control-label">Phone</label>

            <div class="col-md-12">
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required
                       autofocus>

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-12 control-label">Password</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2 col-md-offset-4">
                <div class="checkbox">

                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn green uppercase">
                Login
            </button>
             <a class="create-account-user" href="{{ url('/register') }}">
               Create Account
            </a>
        </div>
    </form>

    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="index.html" method="post">
        <h3 class="font-green">Forget Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="phone"
                   name="phone"/></div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
</div>

<div class="copyright">
    {{date('Y')}} © {{config('app.name')}} |
    Powered By <a class="right" href="{{ env('DOMAIN_NAME') }}" target="_blank">
        Bagerhat Govt High School
    </a>
</div>
<!-- BEGIN CORE PLUGINS -->
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
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
