<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Event</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/android-icon-36x36.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/android-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/android-icon-144x144.png">

    {!! Html::style('assets/admin/global/plugins/bootstrap/css/bootstrap.min.css') !!}
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    {!! Html::style('assets/home-page.css') !!}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    {!! Html::style('assets/admin/layouts/layout/css/custom.css') !!}

    {!! Html::script('assets/admin/global/plugins/jquery.min.js') !!}
    {!! Html::script('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js') !!}

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<nav id="menu" class="navbar navbar-default navbar-fixed-top" style="padding-bottom: 10px;padding-top: 10px;">
     <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand page-scroll" href="#page-top"> <a class="navbar-brand page-scroll" href="{{ url('') }}"><img src="images/main_logo.png" style="height: 50px;margin-top: -20px"></a>
 </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about" class="page-scroll">About</a></li>
                <li><a href="#testimonials" class="page-scroll">Testimonials</a></li>
                <li><a href="#contact" class="page-scroll">Contact</a></li>
                @if (Route::has('login'))
                    @if(!Auth::check())
                        <li><a href="{{ url('/sign-in') }}" class="page-scroll">Login</a></li>
                        <li><a href="{{ url('/register') }}" class="page-scroll">Register</a></li>
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



<!-- About Section -->
<div id="about">
    <div class="container">
        <div class="row">
         <div class="col-md-12">
             <div class="alert alert-success information-box" role="alert" style="margin-top: 30px;line-height: 25px;">Thank you for your registration. For access your profile section please login. When you login site this then you can register for event but you can not get full acees for this site, when admin conform your registration then you get full access and admin conform your registration when you register any one event. </div>
            </div>
        </div>
    </div>
</div>



<!-- Contact Section -->
<div id="contact">
    <div class="container">
        <div class="col-md-7">
            <div class="row">
                <div class="section-title"><h2>Contact Info</h2></div>
                <div class="col-md-4">
                    <div class="contact-item">
                        <p><span>Address</span>Test Address,<br>
                            Bagerhat, Bagerhat</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-item">
                        <p>
                            <span>Phone</span> +880123456789 <br/> +880123456789
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-item">
                        <p><span>Email</span> info@member.exstudentsbghs.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-1 contact-info">
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<div id="footer">
    <div class="container text-center">
        <p>&copy; 2017 Design by <a href="{{ url('') }}" rel="nofollow">Bagerhat School</a></p>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#myCarousel').carousel({
            interval: 4000
        });
    });
</script>

</body>
</html>