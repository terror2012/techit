<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About Us</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('/css/aboutUs.css')}}" rel="stylesheet">
    <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <style>
        #about_us_image{
            height: 320px;
        }
    </style>

    <!-- Navigation -->
@include('layouts/navbar')

    <header><div class="jumbotron jumbotron-fluid jumbotron-schedule" style="@if(!empty($gen['about_img']))background-image: url('{{url($gen['about_img'])}}') @endif">
  <div class="container">
    <h1 class="display-3">About Us</h1>
      <h2>@if(!empty($gen['about_capt'])){{$gen['about_capt']}} @endif</h2>
  </div>
</div></header>

       @if(! empty($aboutUs))
           <div class="container-fluid">
               <div class="row">
                   <div class="col-md-1">
                   </div>
                   <div class="col-md-5">
                       <hr />
                       <img  class="img-responsive" id="about_us_image" alt="Bootstrap Image Preview" src="{{$aboutUs['image']}}" height="320" width="480"/>
                   </div>
                   <div class="col-md-5">
                       <hr />
                       <div class="page-header">

                           <h1>
                               About Us <small>The story of our company</small>
                           </h1>
                       </div>
                       <p>
                           {{$aboutUs['about_us']}}
                       </p>
                   </div>
                   <div class="col-md-1">
                   </div>
               </div>
           </div>
           @endif
    
        

   
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		</div>
       
       
       
       
       
       
       
       
       
       
       
       
    <!-- Page Content -->
     
        <hr>

        <!-- Footer -->
        

   
    <!-- /.container -->
 <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                
            </div>
            <br/>
            <a href="//http:www.doublet.design">DoubleT.Design</a> ©2017</span>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="{{url('/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('/js/bootstrap.min.js')}}"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
