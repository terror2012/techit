<html>
<head>
    <title>Schedule Page</title>
    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{url('/css/schedule.css')}}" rel="stylesheet">
    <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
</head>
<body>
<style>
    #success_message {display: none;}
</style>

@include('layouts/navbar')

<header><div class="jumbotron jumbotron-fluid jumbotron-schedule" style="@if(!empty($gen['schedule_img']))background-image: url('{{url($gen['schedule_img'])}}') @endif">
        <div class="container">
            <h1 class="display-3">Schedule An Appointment</h1>
            <h2>@if(!empty($gen['schedule_capt'])){{$gen['schedule_capt']}} @endif</h2>
        </div>
    </div></header>

<div class="container">

    <form class="well form-horizontal" action="{{url('checkout')}}" method="POST">
        {{csrf_field()}}
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{$formData['publickey']}}"
                data-amount="{{$formData['amount']}}"
                data-name="{{$formData['title']}}"
                data-description="{{$formData['description']}}"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
            Stripe.setPublishableKey('{{$formData['publickey']}}');
        </script>
    </form>
</div>
</div><!-- /.container -->
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="{{url('/js/bootstrap.min.js')}}"></script>
</body>
<footer id="footer">
    <div class="container-fluid">
        <div class="row">

        </div>
        <br/>
        <a href="//http:www.doublet.design">DoubleT.Design</a> ©2017</span>
    </div>
</footer>
</html>