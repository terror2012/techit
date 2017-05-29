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
                    <h1><Strong>{{$user['f_name'] . ' ' . $user['l_name']}}</Strong></h1>
                    
                         <form method="post" action="{{url('/edit_account_details')}}">
                             {{csrf_field()}}
            <!-- First Name Here -->

  <div class="form-group form-group1">
    <label for="InputName">First Name</label>
    <input type="name" class="form-control" id="InputName" placeholder="Enter Your First Name" @if(!empty($user['f_name'])) value="{{$user['f_name']}}" @endif>
    
  </div>
            
            <!-- Surname Here -->

  <div class="form-group form-group1">
    <label for="InputSurname">Last Name</label>
    <input type="name" class="form-control" id="InputSurname"  placeholder="Enter Your Last Name" @if(!empty($user['l_name'])) value="{{$user['l_name']}}" @endif>
    
  </div>
            
            
            <!-- Email Here -->
  <div class="form-group form-group1">
    <label for="InputEmail">Email address</label>
    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" @if(!empty($user['email'])) value="{{$user['email']}}" @endif>
    
  </div>
            <!-- Phone Number Here -->

  <div class="form-group form-group1">
    <label for="InputPhoneNumber">Phone Number</label>
    <input type="number" class="form-control" id="InputPhoneNumber"  placeholder="Enter Your Phone Number" @if(!empty($user['phone'])) value="{{$user['phone']}}" @endif>
    
  </div>
                  <!-- Best Way To Contact Combo -->   
            
         <h2>Prefferred Method Of Contact</h2>
<div class="dropdown">
    

    <select id="contact" name="contact" class="form-control selectpicker" onchange="Contact_for_client()">
        <option value="select"> Select Contact Preferences </option>
        <option value="1">Email</option>
        <option value="2">Phone</option>
        <option value="3">Text</option>
    </select>
           
                </div>   
                <!-- Service Adress -->
                <h2>Service Adress</h2>
                <!-- City -->
  <div class="form-group form-group1">
    <label for="InputSurname">City</label>
    <input type="name" class="form-control" id="City"  placeholder="Enter The City of The Service Location" @if(!empty($user['city'])) value="{{$user['city']}}" @endif>
    
  </div>
                    
        
              <!-- State -->
                
                <div class="dropdown">
                    <select id="state" name="state" class="form-control selectpicker" onchange="State_for_client()">
                        <option value="select" >Please select your state</option>
                        <option value="1">Centenial Hills</option>
                        <option value="2">Summerlin</option>
                        <option value="3">North Las Vegas</option>
                    </select>
           <hr>
                </div>   
            
            

  <div class="form-group form-zipCode">
    <label for="InputPhoneNumber">Zip Code</label>
    <input type="text" class="form-control" id="ZipCode"  placeholder="Enter The Zip Code Of The Service Location" @if(!empty($user['zip'])) value="{{$user['zip']}}" @endif>
    
  </div>
                       <!-- Street Adress -->
  <div class="form-group form-group1">
    <label for="InputSurname">Street</label>
    <input type="name" class="form-control" id="Address"  placeholder="Enter The Street Of Your Service Adress" @if(!empty($user['street'])) value="{{$user['street']}}" @endif>
    
  </div>
                             <button type="submit" class="btn-lg btn-danger"><strong>Edit My Details Details</strong></button>
                         </form>
                    @if (session()->has('flash_notification.message'))
                        <div class="alert alert-{{ session('flash_notification.level') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                            {!! session('flash_notification.message') !!}
                        </div>
                    @endif
                             <table class="table">
                           
                          <!-- /extra icons -->  
  <thead class="thead-inverse">
    <tr>
        
     
      <th>Invoice #</th>
        <th>To Pay</th>
      <th>Date</th>
      <th>Time</th>
    <th>Issue</th>
        <th>Contact Method</th>
    <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($query))
        @foreach($query as $q)
            <tr>
                <th>{{$q['id']}}</th>
                <td>${{$q['value']}}</td>
                <td>{{$q['date']}}</td>
                <td>{{$q['time']}}</td>
                <td><p>{{$q['message']}}</p></td>
                <td>{{$q['contact']}}</td>

                @if($q['paid'] == false)
                    <td><a href="{{url('/account/invoice/' . $q['id'])}}" class="btn-sm btn-primary text-center"><strong>Pay Bill</strong></a> <br>
                        <a href="{{url('/account/delete_invoice/' . $q['id'])}}" class="btn-sm btn-danger text-center"><strong>Cancel</strong></a></td>
                        @else
                    <td>Paid </td>
                        @endif
            </tr>
            @endforeach
        @endif
      
   
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

    @if(!empty($user['contact']))
    <script>
        var contact = document.getElementById('contact');
        contact.value = '{{$user['contact']}}'
    </script>

    @endif
    @if(!empty($user['state']))
        <script>
            var contact = document.getElementById('state');
            contact.value = '{{$user['state']}}'
        </script>

    @endif

</body>

</html>
