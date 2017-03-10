<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Remote Connect</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('css/schedule.css')}}" rel="stylesheet">
    <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
    
     <!-- This makes the disclaimers red -->
 <style>.warning {
    color: firebrick;
}</style>
    
    
    
    <!-- Navigation -->
     @include('layouts/navbar')

    <header><div class="jumbotron jumbotron-fluid jumbotron-schedule">
  <div class="container">
    <h1 class="display-3">Remote Connect</h1>
    
  </div>
</div></header>

       
       
       
       
       
       
       
       
       
       
       
       
       
    <!-- Page Content -->
    <div class="container-fluid schedule-form">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<!-- Form Here -->

             
           <!-- Contact Details Here -->
            <h2 class="warning">Disclaimer : The Cost for the Remote Connect Service is 50 cents per minute </h2>
            <h2>Enter Your Contact Details</h2>
            
            <form class="form-horizontal" id="remote_form" method="post" action="{{url('/remote_connect')}}">
                {{csrf_field()}}
                <div class="form-group form-group1">
                    <label for="InputName">First Name</label>
                    <input type="text" name="firstName" class="form-control" id="InputName" placeholder="Enter Your First Name">

                </div>

                <!-- Surname Here -->

                <div class="form-group form-group1">
                    <label for="InputSurname">Last Name</label>
                    <input type="text" name="lastName" class="form-control" id="InputSurname"  placeholder="Enter Your Last Name">

                </div>

                <div class="form-group form-group1">
                    <label for="InputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter skype">

                </div>


                <!-- Email Here -->
                <div class="form-group form-group1">
                    <label for="InputSkype">Skype</label>
                    <input type="text" name="skype" class="form-control" id="InputSkype" placeholder="Enter skype">

                </div>
                <!-- Phone Number Here -->

                <div class="form-group form-group1">
                    <label for="InputPhoneNumber">Phone Number</label>
                    <input type="number" name="phone" class="form-control" id="InputPhoneNumber"  placeholder="Enter Your Phone Number">

                </div>
                <!-- Best Way To Contact Combo -->
                <!-- Service Adress -->


                <!-- City -->

                <!-- State -->



                <!-- Street Adress -->
                <h2 class="warning"><b>*In order to gain acces to the remote connect service, the client must pay in advance 10 minutes of service</b></h2>

                <div class="send-buttons">
                    <!-- If the user is logged in -->
                    <button onclick="document.getElementById('remote_form').submit()" class="btn btn-default btn-block">Submit</button>
                    <!-- If the user is logged in -->

                    <!-- If the user is not logged in -->
                    <!--       <button class="btn btn-success btn-block">Register</button>
                           <button class="btn btn-danger btn-block">Continue As Guest</button>
                           <!-- If the user is not logged in -->
                </div>
            </form>
            
            
            <!-- First Name Here -->


       
            
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
                <div class="col-xs-12 col-sm-3 column">
                    
                </div>
            </div>
            <br/>
            <a href="//http:www.doublet.design">DoubleT.Design</a> ©2017</span>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="{{url('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
