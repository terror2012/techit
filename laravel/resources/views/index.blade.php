<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cheap Tech Geeks</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('/css/full-slider.css')}}" rel="stylesheet">
    <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
@include('layouts/navbar')

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @if(!empty($count))
                @for ($i = 0; $i < $count; $i++)
                    @if($i == '0')
            <li data-target="#myCarousel" class="active" data-slide-to="{{$i}}"></li>
                    @else
                        <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                        @endif
                @endfor
                @endif
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            @if(!empty($slider))
                @foreach($slider as $s)
                    @if($s->id == $active_id)
                    <div class="item active">
                            <!-- Set the first background image using inline CSS below. -->
                            <div class="fill" style="background-image:url({{$s->slider}});"></div>
                            <div class="carousel-caption">
                                <h2>{{$s->caption}}</h2>
                            </div>
                        </div>
                    @else
                        <div class="item">
                            <!-- Set the first background image using inline CSS below. -->
                            <div class="fill" style="background-image:url({{$s->slider}});"></div>
                            <div class="carousel-caption">
                                <h2>{{$s->caption}}</h2>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

       
       
       
       
       
       
       
       
       
       
       
       
       
    <!-- Page Content -->
    <div class="container">

        @if(! empty($settings))
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{$settings['title']}}</h1>
                    <p>{{$settings['description']}}</p>
                </div>
            </div>
        @endif

        <hr>

        <!-- Footer -->
        

    </div>
    <!-- /.container -->
 <footer id="footer">
        <div class="container-fluid">
            <br/>
            <a href="//http:www.doublet.design">DoubleT.Design</a> ©2017</span>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
