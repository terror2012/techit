<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="T3ddy @ DoubleT.Design" content="">

    <title>Index</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('assets/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{url('assets/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{url('css/creative.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="{{url('css/creative.css')}}" rel="stylesheet">
</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <!--    <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a> -->

            <img class="img-responsive" src="{{url('img/logo.png')}}" width="270" height="50" alt="">
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="btn-primary" href="#">Home</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">Services</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">How To</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">Comments</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">Schedule</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">About</a>
                </li>

                <li>
                    <a class="page-scroll" href="#">Contact</a>
                </li>
                <li>
                    <a class="#">Call: {{$settings['phone_number']}} </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header>





    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @if(!empty($count))
                @for($i = 0; $i < $count; $i++)
                        <li data-target="#myCarousel" data-slide-to="0" @if($i == 0) class="active" @endif
            <li data-target="#myCarousel" data-slide-to="1"></li>
                @endfor
                @endif
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @if(!empty($slider))
                @foreach($slider as $s)
                    <div class="item @if($s->id == $active_id) active @endif">
                        <img src="{{url($s->slider)}}" alt="{{$s->caption}}">
                    </div>
                @endforeach
                @endif
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="section-heading">Computer and Repair Services</h1>
                <h3 class="selection-heading">{{$settings['service_landing']}}</h3>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            @if(!empty($services))
                @foreach($services as $ser)
                    <div class="col-lg-2 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x {{$ser->icon}} text-primary sr-icons"></i>
                            <h3>{{$ser->name}}</h3>
                            <p class="text-muted">{{$ser->small_description}}.</p>
                        </div>
                    </div>
                @endforeach
            @endif
    </div>
</section>

<aside class="bg-dark">
    <div class="container text-center">

        <div class="col-lg-8 bg-primary">

            <h2 class="section-heading">About us</h2>
            <hr class="light">
            <p class="text-faded">
                {{$settings['about_us_landing']}}
            </p>
                <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>



        </div>

        <div class="col-lg-4 call-to-action">
            <h2>Service Area</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d412505.27124108165!2d-115.45519672466003!3d36.12522845577519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80beb782a4f57dd1%3A0x3accd5e6d5b379a3!2sLas+Vegas%2C+NV%2C+USA!5e0!3m2!1sen!2sro!4v1494769339255" width="250" height="250" frameborder="0" style="border:0" ></iframe>
    </div>
</aside>


<!-- Testimonial -->

<section id="carousel">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
                <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#fade-quote-carousel" data-slide-to="0"></li>
                        <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                        <li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li>
                        <li data-target="#fade-quote-carousel" data-slide-to="3"></li>
                        <li data-target="#fade-quote-carousel" data-slide-to="4"></li>
                        <li data-target="#fade-quote-carousel" data-slide-to="5"></li>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item">
                            <div class="profile-circle" style="background-color: rgba(0,0,0,.2);"></div>
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                            </blockquote>
                        </div>
                        <div class="item">
                            <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                            </blockquote>
                        </div>
                        <div class="active item">
                            <div class="profile-circle" style="background-color: rgba(145,169,216,.2);"></div>
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                            </blockquote>
                        </div>
                        <div class="item">
                            <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                            </blockquote>
                        </div>
                        <div class="item">
                            <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                            </blockquote>
                        </div>
                        <div class="item">
                            <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container contact">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Let's Get In Touch!</h2>
                <hr class="primary">

            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x sr-contact"></i>
                <h3>{{$settings['phone_number']}}</h3>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                <h3><a href="mailto:{{$settings['email']}}">{{$settings['email']}}</a></h3>
            </div>
        </div>
    </div>
</section>

<footer class="footer1">
    <div class="container">

        <div class="row"><!-- row -->

            <div class="col-lg-3 col-md-3"><!-- widgets column center -->



                <ul class="list-unstyled clear-margins"><!-- widgets -->

                    <li class="widget-container widget_recent_news"><!-- widgets list -->

                        <h1 class="title-widget">Contact us </h1>

                        <div class="footerp">

                            <h2 class="title-median">Cheap Tech Geeks</h2>

                            <p>
                                @for($o = 0; $o < count($settings['contact_info']); $o++)
                                    {{$settings['contact_info'][$o]}} <br>
                                    @endfor
                            </p>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
</footer>
<!--header-->

<div class="footer-bottom">

    <div class="container">

        <div class="row">

            <div class="text-center">

                <div class="copyright ">

                    Copyright©2017 Powered by Cheaptechgeeks.com All rights reserved

                </div>

            </div>



        </div>

    </div>

</div>

<!-- jQuery -->
<script src="{{url('assets/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{url('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{{url('assets/scrollreveal/dist/scrollreveal.min.js')}}"></script>
<script src="{{url('assets/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>

<!-- Theme JavaScript -->
<script src="{{url('js/creative.min.js')}}"></script>

</body>

</html>
