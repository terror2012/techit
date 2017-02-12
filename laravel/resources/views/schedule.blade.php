<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Schedule</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('/css/schedule.css')}}" rel="stylesheet">
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

<header><div class="jumbotron jumbotron-fluid jumbotron-schedule" style="@if(!empty($gen['schedule_img']))background-image: url('{{url($gen['schedule_img'])}}') @endif">
        <div class="container">
            <h1 class="display-3">Schedule An Appointment</h1>
            <h2>@if(!empty($gen['schedule_capt'])){{$gen['schedule_capt']}} @endif</h2>
        </div>
    </div></header>














<!-- Page Content -->
<div class="container-fluid schedule-form">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <!-- Form Here -->
            <h2>Select Client Type</h2>
            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" id="client" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Client Type
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu text-center" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li>
                        <a onClick="Client_for_client('Residential Client')" href="#">Residential Client</a>
                    </li>
                    <li>
                        <a onClick="Client_for_client('Business Client')" href="#">Business Client</a>
                    </li>
                    <li>
                        <a onClick="Client_for_client('Small Business')" href="#">Small Business</a>
                    </li>

                </ul>

            </div>
            <p><i><small>*Business Clients have the first labor hour free</small></i></p>

            <!-- Contact Details Here -->

            <h2>Enter Your Contact Details</h2>

            <!-- Business Name Here -->


            <!-- First Name Here -->

            <form>
                <div class="form-group form-group1">
                    <label for="InputName">First Name</label>
                    <input type="name" class="form-control" id="InputName" name="firstName" placeholder="Enter Your First Name">

                </div>
            </form>

            <!-- Surname Here -->

            <form>
                <div class="form-group form-group1">
                    <label for="InputSurname">Last Name</label>
                    <input type="name" class="form-control" id="InputSurname" name="lastName"  placeholder="Enter Your Last Name">

                </div>
            </form>


            <!-- Email Here -->
            <form>
                <div class="form-group form-group1">
                    <label for="InputEmail">Email address</label>
                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter email">

                </div>
            </form>
            <!-- Phone Number Here -->

            <form>
                <div class="form-group form-group1">
                    <label for="InputPhoneNumber">Phone Number</label>
                    <input type="number" class="form-control" id="InputPhoneNumber" name="phoneNumber"  placeholder="Enter Your Phone Number">

                </div>
            </form>
            <!-- Best Way To Contact Combo -->

            <h2>What is the best way to contact you?</h2>
            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Select The Best Way to Contact You
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu text-center" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li><a onClick="Contact_for_client('email')">Email</a></li>
                    <li><a onclick="Contact_for_client('phone')">Phone</a></li>
                    <li><a onclick="Contact_for_client('text')">Text</a></li>

                </ul>

            </div>
            <!-- Service Adress -->
            <h2>Service Adress</h2>

            <!-- City -->
            <form>
                <div class="form-group form-group1">
                    <label for="InputSurname">City</label>
                    <input type="name" class="form-control" id="InputSurname" name="city"  placeholder="Enter The City of The Service Location">

                </div>
            </form>
            <!-- State -->

            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Select The State
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu text-center" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li>
                        <a onClick="State_for_client('Centenial Hills')">Centenial Hills</a>
                    </li>
                    <li >
                        <a onClick="State_for_client('Summerlin')">Summerlin</a>
                    </li>
                    <li>
                        <a onClick="State_for_client('North Las Vegas')">North Las Vegas</a>
                    </li>

                </ul>

            </div>



            <form>
                <div class="form-group form-zipCode">
                    <label for="InputPhoneNumber">Zip Code</label>
                    <input type="number" class="form-control" id="InputPhoneNumber" name="zip"  placeholder="Enter The Zip Code Of The Service Location">

                </div>
            </form>
            <!-- Street Adress -->
            <form>
                <div class="form-group form-group1">
                    <label for="InputSurname">Street</label>
                    <input type="name" class="form-control" id="InputSurname" name="street"  placeholder="Enter The Street Of Your Service Adress">

                </div>
            </form>


            <h2>Please Select The Date</h2>
            <!-- Date Selector -->
            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Select The Date
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu text-center" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        @if(!empty($days))

                            @if(!empty($dayExist))
                            @for($i = 0; $i < count($days); $i++)

                                @if(in_array($days[$i], $dayExist))

                                    <li id="{{$days[$i]}}" class="disabled">
                                        <a>{{$days[$i]}}</a>
                                    </li>

                                @else
                                    <li id="{{$days[$i]}}">
                                        <a onClick="Date_for_client('{{$days[$i]}}')">{{$days[$i]}}</a>
                                    </li>

                                @endif
                            @endfor

                        @else
                            @for($i = 0; $i < count($days); $i++)
                                <li id="{{$days[$i]}}">
                                    <a onClick="Date_for_client('{{$days[$i]}}')">{{$days[$i]}}</a>
                                </li>
                            @endfor
                        @endif



                        @endif

                </ul>

            </div>

            <h2>Please Select The Timeslot</h2>
            <!-- Date Selector -->
            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Select The Time
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu text-center" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li id="time10" @if(!empty($timeExist)) @if(in_array('10:00 AM', $timeExist)) class="disabled" @endif @endif>
                        <a @if(!empty($timeExist)) @if(in_array('10:00 AM', $timeExist)) onClick="Time_for_client('10:00 AM')" @endif @else onClick="Time_for_client('10:00 AM')" @endif>10:00AM to 11:00AM</a>
                    </li>
                    <li id="time11" @if(!empty($timeExist)) @if(in_array('11:30 AM', $timeExist)) class="disabled" @endif @endif>
                        <a  @if(!empty($timeExist)) @if(!in_array('11:30 AM', $timeExist)) onClick="Time_for_client('11:30 AM')" @endif @else onClick="Time_for_client('11:30 AM')" @endif>11:30AM to 12:30AM</a>
                    </li>
                    <li id="time01" @if(!empty($timeExist)) @if(in_array('01:00 PM', $timeExist)) class="disabled" @endif @endif>
                        <a  @if(!empty($timeExist)) @if(in_array('01:00 PM', $timeExist)) onClick="Time_for_client('01:00 PM')" @endif @else onClick="Time_for_client('01:00 AM')" @endif>01:00PM to 02:00PM</a>
                    </li>
                </ul>



                <div class="form-group form-group1">
                    <label for="message">Describe your Problem</label>
                    <textarea class="form-control" rows="6" name="message" id="message">Please Describe your Problem</textarea>
                </div>



                <h2><b>*To Confirm an appointment there is a 15$ fee</b></h2>
                <input type="hidden" id="client_inp" name="client"/>
                <input type="hidden" id="state_inp" name="state"/>
                <input type="text" id="date_inp" name="date"/>
                <input type="text" id="time_inp" name="time"/>
                <input type="hidden" id="contact_inp" name="contact"/>

            </div>

            <div class="send-buttons">
                <!-- If the user is logged in -->
                @if(Auth::check())
                <button class="btn btn-default btn-block">Submit</button>
                <!-- If the user is logged in -->
                @else
                <!-- If the user is not logged in -->
                <button id="regTest" class="btn btn-success btn-block">Register</button>
                <button class="btn btn-danger btn-block">Continue As Guest</button>
                <!-- If the user is not logged in -->
                    @endif
            </div>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>

<script>
    var socket = io('http://techit.dev:3000');

    function Date_for_client(date)
    {
        $('#date_inp').val(date);
    }
    function Time_for_client(time)
    {
        $('#time_inp').val(time);
    }
    function Client_for_client(client)
    {
        $('#client_inp').val(client);
    }
    function State_for_client(address)
    {
        $('#state_inp').val(address);
    }
    function Contact_for_client(contact)
    {
        $('#contact_inp').val(contact);
    }
    socket.on('business', function(msg){
        console.log(msg);
            if (msg == "10:00PM") {
            $('#time10').addClass('disabled');
        }
        if (msg == "11:30PM") {
            $('#time11').addClass('disabled');
        }
        if (msg == "01:00PM") {
            $('#time01').addClass('disabled');
        }
        });


</script>


</body>

</html>
