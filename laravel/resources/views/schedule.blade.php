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

    <form class="well form-horizontal" action="{{url('/schedule/submit')}}" method="post"  id="schedule_form">
        {{csrf_field()}}
        <fieldset>

            <!-- Form Name -->
            <legend>Schedule An Appointment</legend>

            @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {!! session('flash_notification.message') !!}
                </div>
            @endif

            <div class="form-group">
                <label class="col-md-4 control-label">Client Type</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select id="client" name="client" class="form-control selectpicker" onchange="Client_for_client()">
                            <option value="select"> Select Client Type </option>
                            <option value="Residential">Residential Client</option>
                            <option value="Business">Business Client</option>
                            <option value="Small Business">Small Business</option>
                        </select>
                    </div>
                </div>
            </div>

            <p style="color: black; text-align: center;"><i><small>*Business Clients have the first labor hour free</small></i></p>
            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">First Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="firstName" placeholder="First Name" class="form-control"  type="text">
                    </div>
                    <p>{{$errors->first('firstName')}}</p>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label" >Last Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="lastName" placeholder="Last Name" class="form-control"  type="text">
                    </div>
                        <p>{{$errors->first('lastName')}}</p>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">

                    </div>
                    <p>{{$errors->first('email')}}</p>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Phone #</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="phoneNumber" placeholder="" class="form-control" type="text">

                    </div>
                    <p>{{$errors->first('phoneNumber')}}</p>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label">Contact Preference</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <select id="contact" name="contact" class="form-control selectpicker" onchange="Contact_for_client()">
                            <option value="select"> Select Contact Preferences </option>
                            <option value="1">Email</option>
                            <option value="2">Phone</option>
                            <option value="3">Text</option>
                        </select>
                    </div>
                </div>
            </div>



            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input style="color: black;" name="city" placeholder="city" class="form-control"  type="text" value="Las Vegas" disabled>
                        <input type="hidden" name="city" value="Las Vegas"/>
                    </div>
                </div>
            </div>

            <!-- Select Basic -->

            <div class="form-group">
                <label class="col-md-4 control-label">State</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        <select id="state" name="state" class="form-control selectpicker" onchange="State_for_client()">
                            <option value="select" >Please select your state</option>
                            <option value="1">Centenial Hills</option>
                            <option value="2">Summerlin</option>
                            <option value="3">North Las Vegas</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Zip Code</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="zip" placeholder="" class="form-control"  type="text">
                    </div>
                    <p>{{$errors->first('zip')}}</p>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="street" placeholder="Address" class="form-control" type="text">
                    </div>
                    <p>{{$errors->first('street')}}</p>
                </div>
            </div>


            <!-- radio checks -->

            <!-- Text area -->

            <div class="form-group">
                <label class="col-md-4 control-label">Date</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <select id="date" name="date" class="form-control selectpicker" onchange="Date_for_client()">
                            <option value="select" >Please select the date</option>
                            @if(!empty($days))

                                @if(!empty($dayExist))
                                    @for($i = 0; $i < count($days); $i++)

                                        @if(in_array($days[$i], $dayExist))
                                            <option class="date" id="{{$days[$i]}}" value="{{$days[$i]}}" disabled>{{$days[$i]}}</option>

                                        @else
                                            <option class="date" id="{{$days[$i]}}" value="{{$days[$i]}}">{{$days[$i]}}</option>

                                        @endif
                                    @endfor

                                @else
                                    @for($i = 0; $i < count($days); $i++)
                                        <option class="date" id="{{$days[$i]}}" value="{{$days[$i]}}">{{$days[$i]}}</option>
                                    @endfor
                                @endif



                            @endif
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Time</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        <select id="time" name="time" class="form-control selectpicker" onchange="Time_for_client()" >
                            <option value="select" >Please select your time</option>
                            <option class="time" id="10:00 AM" value="10:00 AM"> 10:00 AM </option>
                            <option class="time" id="11:30 AM" value="11:30 AM"> 11:30 AM </option>
                            <option class="time" id="01:00 PM" value="01:00 PM"> 01:00 PM </option>


                        </select>
                    </div>
                </div>
            </div>



            <div class="form-group">
                <label class="col-md-4 control-label">Problem Description</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea class="form-control" name="message" placeholder="Project Description"></textarea>
                        <p>{{$errors->first('message')}}</p>
                    </div>
                </div>
            </div>
            {{--<input type="hidden" id="client_inp" name="client"/>
            <input type="hidden" id="state_inp" name="state"/>
            <input type="hidden" id="date_inp" name="date"/>
            <input type="hidden" id="time_inp" name="time"/>
            <input type="hidden" id="contact_inp" name="contact"/>--}}
            <!-- Success message -->
            <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    @if(Auth::check())
                        <button onclick="submit_and_redirect()" class="btn btn-warning" >Submit Schedule<span class="glyphicon glyphicon-send"></span></button>
                    @else
                        <button onclick="submit_checkout()" class="btn btn-warning" >Continue as Guest <span class="glyphicon glyphicon-send"></span></button>
                        <button onclick="submit_and_register()" class="btn btn-info" > Register and Checkout <span class="glyphicon glyphicon-send"></span></button>
                    @endif

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>

<script>


    var socket = io('{{url('/')}}:3000');
    socket.on('business', function (date){
        var currDate = document.getElementById('date').value;
        getDateN();
        if(currDate == date)
         {
             if($('option[value="' + date + '"]').prop('disabled'))
             {
                 document.getElementById('date').value = 'select';
                 document.getElementById('time').value = 'select';
             }
             else
             {
                 document.getElementById('date').value = date;
                getTime(currDate);
                 var time = document.getElementById('time').value;
                 console.log(time);
                 if($('option[value="' + time + '"]').prop('disabled'))
                 {
                     document.getElementById('time').value = 'select';
                 }
                 else
                 {
                     document.getElementById('time').value = time;
                 }
             }
         }
    });
    function Date_for_client()
    {
        var date = document.getElementById('date').value;
        /*$('#date_inp').val(date);*/
        getTime(date);
    }
    function Time_for_client()
    {
        var time = document.getElementById('time').value;
//        $('#time_inp').val(time);
    }
    function Client_for_client()
    {
        var client = document.getElementById('client').value;
//        $('#client_inp').val(client);
    }
    function State_for_client()
    {
        var state = document.getElementById('state').value;
//        $('#state_inp').val(state);
    }
    function Contact_for_client()
    {
        var contact = document.getElementById('contact').value;
//        $('#contact_inp').val(contact);
    }
    function submit_and_register()
    {
        document.getElementById('schedule_form').action = '{{url('/schedule/register')}}';
        document.getElementById('schedule_form').submit();
    }
    function submit_checkout()
    {
        document.getElementById('schedule_form').action = '{{url('/schedule/guest_pay')}}';
        document.getElementById('schedule_form').submit();
    }
    function submit_and_redirect()
    {
        document.getElementById('schedule_form').submit();
    }
    function getDateN()
    {
        $("option[class='date']").prop('disabled', false);
        $.ajax({
            url: "{{url('/schedule/getDate')}}",
            type: "GET",
            async: false,
            success: function (data) {
                var dates = JSON.parse(data);
                $.each(dates, function(key, value){
                    $("option[value='" + value +"']").prop('disabled', true);
                })
            }
        });
    }

    function getTime(date)
    {
        $("option[class='time']").prop('disabled', false);
        $.ajax({
            url: "{{url('/schedule/getTime')}}" + "/" + date,
            type: "GET",
            async: false,
            success: function (data) {
            var times = JSON.parse(data);
            $.each(times, function(key, value){
                $("option[value='" + value + "']").prop('disabled', true);
            })
            }
        });
    }

</script>

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