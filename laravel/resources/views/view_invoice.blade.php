<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Account</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('/css/myAccount.css')}}" rel="stylesheet">
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

<header><div class="jumbotron jumbotron-fluid jumbotron-schedule" style="@if(!empty($gen['myacc_img']))background-image: url('{{url($gen['myacc_img'])}}') @endif">
        <div class="container">
            <h1 class="display-3">My Account</h1>
            <h2>@if(!empty($gen['myacc_capt'])){{$gen['myacc_capt']}} @endif</h2>
        </div>
    </div></header>














<!-- Page Content -->
<hr>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <h1><Strong>{{$query['name']}}</Strong></h1>

                        <br>
                        <br>

                        <h4>ID: {{$query['id']}}</h4>
                        <h4>To pay: {{$query['value']}}</h4>
                        <h4>Date: {{$query['date']}}</h4>
                        <h4>Time: {{$query['time']}}</h4>
                        <h4>Prefered Contact Method: {{$query['contact']}}</h4>
                        <h4>Paid Status: {{$query['paid']}}</h4>
                        <h4>Issue: {{$query['message']}}</h4>
                        <form class="well form-horizontal" action="{{url('/account/checkout/' . $query['id'])}}" method="POST">
                            {{csrf_field()}}
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{$formData['publickey']}}"
                                    data-amount="{{$formData['amount']}}"
                                    data-name="{{$formData['title']}}"
                                    data-description="{{$formData['description']}}"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto">
                            </script>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>


</div>
<div class="col-md-3">
</div>
</div>
</div>

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

</html>
