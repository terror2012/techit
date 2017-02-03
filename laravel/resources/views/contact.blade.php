<!DOCTYPE html>
<html>
    <head>
        <title>Services</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/contact.css"/>
    </head>

<body>


@include('layouts/navbar')
    
 <div class="container padding text-center">
     <div class="row">
        <div class="col-md-6">
        
        
        </div>
        
       
    <hr />
    <div class="container padding">
     <div class="row">
         <div class="col-md-2"></div>
            <div class="col-md-8">
                @if(!empty($general))
                <h1 class="text-center">Contact Us!</h1>
        <h2 class="text-center"><b>Phone: </b>{{$general['phone']}}</h2>
                <h3><i>Call or Text</i></h3>
        <h2 class="text-center"><b>Email: </b>{{$general['email']}}</h2>
        
        <h2 class="text-center"><i>Open for Business {{$general['days']}} {{$general['hours']}}</i></h2>
                @endif
              <!--  <h3>Send us a Message</h3>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number:</label>
                            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                            
                             <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                    <div id="success"></div> -->
                    <!-- For success/fail messages -->
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-7 padding">
                   
                            </div>
                       
                </form>
            </div>
         <div class="col-md-2"></div>

        </div>
    
    
    </div>
    
    
    
    
    
    
   
    

    
    
<script src="js/jquery.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
    </body>





</html>