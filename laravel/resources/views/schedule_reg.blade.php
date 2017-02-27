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

    <form class="well form-horizontal" action="{{url('/schedule/reg_complete')}}" method="post"  id="schedule_form">
        {{csrf_field()}}
        <fieldset>

            <!-- Form Name -->
            <legend>Register &amp; Submit Appointment</legend>

            @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {!! session('flash_notification.message') !!}
                </div>
            @endif
            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Email</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input  name="email" placeholder="Email" class="form-control"  type="text" value="{{$email}}" disabled>
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label" >Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="password" placeholder="Password" class="form-control"  type="password">
                    </div>
                </div>
            </div>

            <!-- Text input-->


            <!-- Text input-->


        <!-- Success message -->
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                        <button type="submit" class="btn btn-default" >Register and Submit<span class="glyphicon glyphicon-send"></span></button>

                </div>
            </div>




        </fieldset>
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