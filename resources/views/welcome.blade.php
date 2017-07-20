<?php 
$main_path = url('/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bagerhat Govt High School</title>
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

<header id="header">
    <div class="intro">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div id="myCarousel" class="carousel slide text-center intro-text" data-ride="carousel">
                        <div class="carousel-inner">

                           <!--  @if($newsList->count())
                            <?php $cnt = 0; ?>
                            @foreach($newsList as $news)
                            <div class="item {!! $cnt == 0 ? 'active' : '' !!}">
                                <h1>{{ $news->news_title }}</h1>
                                <p>{{ $news->news_body }}</p>
                                <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a>
                            </div>
                            <?php $cnt++; ?>
                            @endforeach
                            @else
                            <h1>Currently There is No News</h1>
                            @endif -->

                            <div class="item active">
                                <img src="../images/slider/slider1.jpg" alt="Register1" style="width: 1170px;height: 500px">
                            </div>

                            <div class="item">
                             <img src="../images/slider/slider2.jpg" alt="Register2" style="width: 1170px;height: 500px">
                         </div>

                         <div class="item">
                             <img src="../images/slider/slider3.jpg" alt="Register3" style="width: 1170px;height: 500px">
                         </div>
                         <div class="item">
                             <img src="../images/slider/slider4.jpg" alt="Register4" style="width: 1170px;height: 500px">
                         </div>
                         <div class="item">
                             <img src="../images/slider/slider5.jpg" alt="Register5" style="width: 1170px;height: 500px">
                         </div>

                     </div>



                     <!-- Left and right controls -->
                     <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
<!-- Get Touch Section -->
<div id="get-touch">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-1">
                <h3>Next upcoming event for Bagerhat Govt High School</h3>
                <p>N.B To join the event you have to pay before and register</p>
            </div>
            <div class="col-xs-12 col-md-4 text-center">
                <a href="{{ url('/register') }}" class="btn btn-custom btn-lg page-scroll">Join Event</a>
            </div>
        </div>
    </div>
</div>
<!-- About Section -->
<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6"><img src="images/home-page/school-home-page.jpg" class="img-responsive" alt=""></div>
            <div class="col-xs-12 col-md-6">
                <div class="about-text">
                    <h2>Bagerhat Govt High School</h2>
                    <p>
                        Bagerhat Govt High School is a government secondary school located in the heart of Bagerhat town in Bagerhat Sadar Upazila, Bangladesh. It was established as Nurul Amin School in 1947 by getting help from the British Government. In 1967, the school became a government high school. After the liberation war, the previous name was removed and it holds its current name as Bagerhat Govt High School. This school has two shifts and enrollment of approximately 2,000 students.
                    </p>
                    <h3>What we do?</h3>
                    <div class="list-style">
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <ul>
                                <li>Arrange Event</li>
                                <li>Let event registration</li>
                                <li>Post school news</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <ul>
                                <li>Arrange Get-together</li>
                                <li>Collect fund</li>
                                <li>School Project</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Contact Section -->
<div id="contact">
    <div class="container">
        <div class="col-md-9">
            <div class="row">
                <div class="section-title"><h2>Contact Info</h2></div>
                <div class="col-md-4">
                    <div class="contact-item">
                        <p><span>Address</span>Bagerhat Govt High School,<br>
                            Old Rupsha Road,Bagerhat.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-item">
                        <p>
                            <span>Phone</span> +8801717963568 <br/> +8801715442209
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-item">
                        <p><span>Email</span> info@exstudentsbghs.com</p>
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
        <p>&copy; 2017 Design by <a href="{{ url('') }}" rel="nofollow">Bagerhat Govt High School</a></p>
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