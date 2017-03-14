<html>
<head>
    <title>Schedule Page</title>
    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{url('/css/schedule.css')}}" rel="stylesheet">
    <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
</head>
<body onload="setTimeout(redirect, 10000)">
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

    <div class="well">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                @if(isset($type))
                    @if($type == 'query')
                        <h1>Thank you for submitting your query. The query number #{{$id}} has been registered. And you will be contacted soon with more details.</h1>
                    @else
                        <h1>Thank you for submitting your Remote Connect Queue. The remote number #{{$id}} has been registered. And you will be contacted soon with more details.</h1>
                    @endif
                    @endif
            </div>
    </div>

</div>
</div><!-- /.container -->
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="{{url('/js/bootstrap.min.js')}}"></script>
</body>
<script>
    function redirect()
    {
        window.location = "{{url('/howto')}}";
    }
</script>
<footer id="footer">
    <div class="container-fluid">
        <div class="row">

        </div>
        <br/>
        <a href="//http:www.doublet.design">DoubleT.Design</a> ©2017</span>
    </div>
</footer>
</html>