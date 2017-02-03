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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/myAccount.css" rel="stylesheet">
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

    <header><div class="jumbotron jumbotron-fluid jumbotron-schedule">
  <div class="container">
    <h1 class="display-3">My Account</h1>
    
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
                    <h1><Strong>John Doe</Strong></h1>
                    
                         <form method="post" action="{{url('/edit_account_details')}}">
                             {{csrf_field()}}
            
            
            
            <!-- First Name Here -->

  <div class="form-group form-group1">
    <label for="InputName">First Name</label>
    <input type="name" class="form-control" id="InputName" placeholder="Enter Your First Name">
    
  </div>
            
            <!-- Surname Here -->

  <div class="form-group form-group1">
    <label for="InputSurname">Last Name</label>
    <input type="name" class="form-control" id="InputSurname"  placeholder="Enter Your Last Name">
    
  </div>
            
            
            <!-- Email Here -->
  <div class="form-group form-group1">
    <label for="InputEmail">Email address</label>
    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
            <!-- Phone Number Here -->

  <div class="form-group form-group1">
    <label for="InputPhoneNumber">Phone Number</label>
    <input type="number" class="form-control" id="InputPhoneNumber"  placeholder="Enter Your Phone Number">
    
  </div>
                  <!-- Best Way To Contact Combo -->   
            
         <h2>Prefferred Method Of Contact</h2>
<div class="dropdown">
    
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Select The Best Way to Contact You
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu text-center" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li><a href="#">Email</a></li>
                    <li><a href="#">Phone</a></li>
                      <li><a href="#">Text</a></li>
                    
                  </ul>
           
                </div>   
                <!-- Service Adress -->
                <h2>Service Adress</h2>
                
                <!-- City -->
  <div class="form-group form-group1">
    <label for="InputSurname">City</label>
    <input type="name" class="form-control" id="City"  placeholder="Enter The City of The Service Location">
    
  </div>
                    
        
              <!-- State -->
                
                <div class="dropdown">
    
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Select The State
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu text-center" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li><a href="#">Nv</a></li>
                    <li><a href="#">Ny</a></li>
                      <li><a href="#">Etc.</a></li>
                    
                  </ul>
           <hr>
                </div>   
            
            

  <div class="form-group form-zipCode">
    <label for="InputPhoneNumber">Zip Code</label>
    <input type="number" class="form-control" id="ZipCode"  placeholder="Enter The Zip Code Of The Service Location">
    
  </div>
                       <!-- Street Adress -->
  <div class="form-group form-group1">
    <label for="InputSurname">Street</label>
    <input type="name" class="form-control" id="Address"  placeholder="Enter The Street Of Your Service Adress">
    
  </div>
                             <button type="submit" class="btn-lg btn-danger"><strong>Edit My Details Details</strong></button>
                         </form>

                             <table class="table">
                           
                          <!-- /extra icons -->  
  <thead class="thead-inverse">
    <tr>
        
     
      <th>Invoice #</th>
        <th>Value</th>
      <th>Date</th>
      <th>Time</th>
    <th>Issue</th>
    <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">001</th>
      <td>200$</td>
      <td>02/01/2017</td>
        <td>15:00</td>
        <td><p>Computer is very slow. Probably broken hdd</p></td>
    
        <td><button class="btn-sm btn-primary text-center"><strong>Pay Bill</strong></button>
        <button class="btn-sm btn-danger text-center"><strong>Cancel Appointment</strong></button>
        
        </td>
    <td></td>
      </tr>
      
   
  </tbody>
</table>

                        
            
                        

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
                <div class="col-xs-6 col-sm-3 column">
                    <h4>Information</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Products</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Benefits</a></li>
                        <li><a href="">Developers</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-3 column">
                    <h4>About</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 column">
                    
                </div>
                
            </div>
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
