<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Event</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

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
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand page-scroll" href="#page-top">Bagerhat</a>
            <div class="phone"><span>Call Today</span>320-123-4321</div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about" class="page-scroll">About</a></li>
                <li><a href="#testimonials" class="page-scroll">Testimonials</a></li>
                <li><a href="#contact" class="page-scroll">Contact</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>
<!-- Header -->
<header id="header">
    <div class="intro">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    {{--<div class="col-md-8 col-md-offset-2 intro-text">--}}

                        {{--<h1>Home Construction<br>& Remodeling</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                            diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                        <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a>--}}

                        {{--<div id="thirdCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner" role="listbox">
                                <div class="item" style="display: block">
                                    <div class="col-md-8 col-md-offset-2 intro-text">
                                        <div>
                                            <img class="img-responsive" src="/images/app/Carasuel-3.jpg" alt="image">
                                            --}}{{--<h1>Home Construction<br>& Remodeling</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                                                diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                                            <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a>--}}{{--
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-md-8 col-md-offset-2 intro-text">
                                        <div>
                                            <img class="img-responsive" src="/images/app/Carasuel-1.jpg" alt="image">
                                            --}}{{--<h1>Home Construction<br>& Remodeling</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                                                diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                                            <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a>--}}{{--
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    <div id="myCarousel" class="carousel slide text-center intro-text" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <h1>Home Construction<br>& Remodeling</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                                    diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                                <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a>
                            </div>
                            <div class="item">
                                <h1>Home Construction<br>& Remodeling</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                                    diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                                <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a>
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

                    <script>
                        $(document).ready(function () {
                            $('#myCarousel').carousel({
                                interval: 1000
                            });
                        });
                    </script>
                    {{--</div>--}}
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
                <h3>Next upcoming event for Bagerhat school</h3>
                <p>N.B To join the event you have to pay before and register</p>
            </div>
            <div class="col-xs-12 col-md-4 text-center">
                <a href="#contact" class="btn btn-custom btn-lg page-scroll">Join Event</a>
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
                    <h2>Bagerhat School</h2>
                    <p>
                        This website is designed for only Bagerhat school students. Here the current student and also
                        the ex students will find the upcoming event arrangement information and they will be able to
                        register for participating to the event.There will be news about school.
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
<!-- Services Section -->
<div id="services">
    <div class="container">
        <div class="section-title">
            <h2>Next Events</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="service-media"><img src="home-page/service-1.jpg" alt=" "></div>
                <div class="service-desc">
                    <h3>New Home Construction</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                        sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-media"><img src="img/services/service-2.jpg" alt=" "></div>
                <div class="service-desc">
                    <h3>Home Additions</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                        sedasd commodo nibh ante facilisis bibendum dolor feugiat at. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-media"><img src="img/services/service-3.jpg" alt=" "></div>
                <div class="service-desc">
                    <h3>Bathroom Remodels</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                        sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery Section -->
<div id="portfolio">
    <div class="container">
        <div class="section-title">
            <h2>Previous Events</h2>
        </div>
        <div class="row">
            <div class="portfolio-items">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="img/portfolio/01-large.jpg" title="Project Title" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>Lorem Ipsum</h4>
                                </div>
                                <img src="img/portfolio/01-small.jpg" class="img-responsive" alt="Project Title">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonials Section -->
<div id="testimonials">
    <div class="container">
        <div class="section-title">
            <h2>Testimonials</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"><img src="img/testimonials/01.jpg" alt=""></div>
                    <div class="testimonial-content">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                            diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at."</p>
                        <div class="testimonial-meta"> - John Doe</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"><img src="img/testimonials/02.jpg" alt=""></div>
                    <div class="testimonial-content">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                            diam sedasd commodo nibh ante facilisis."</p>
                        <div class="testimonial-meta"> - Johnathan Doe</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"><img src="img/testimonials/03.jpg" alt=""></div>
                    <div class="testimonial-content">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                            diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at."</p>
                        <div class="testimonial-meta"> - John Doe</div>
                    </div>
                </div>
            </div>
            <div class="row"></div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"><img src="img/testimonials/04.jpg" alt=""></div>
                    <div class="testimonial-content">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                            diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at."</p>
                        <div class="testimonial-meta"> - Johnathan Doe</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"><img src="img/testimonials/05.jpg" alt=""></div>
                    <div class="testimonial-content">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                            diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at."</p>
                        <div class="testimonial-meta"> - John Doe</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"><img src="img/testimonials/06.jpg" alt=""></div>
                    <div class="testimonial-content">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare
                            diam sedasd commodo nibh ante facilisis."</p>
                        <div class="testimonial-meta"> - Johnathan Doe</div>
                    </div>
                </div>
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
                        <p><span>Address</span>4321 California St,<br>
                            San Francisco, CA 12345</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-item">
                        <p>
                            <span>Phone</span> +1 123 456 1234 <br/> +1 123 456 1234
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-item">
                        <p><span>Email</span> info@company.com</p>
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
        <p>&copy; 2017 Design by <a href="#" rel="nofollow">Bagerhat School</a></p>
    </div>
</div>
{{--<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/main.js"></script>--}}


</body>
</html>