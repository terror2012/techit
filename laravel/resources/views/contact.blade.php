<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{url('/css/contact.css')}}"/>
    </head>

<body>


@include('layouts/navbar')

         <header><div class="jumbotron jumbotron-fluid jumbotron-schedule" style="@if(!empty($general['contact_img']))background-image: url('{{url($general['contact_img'])}}') @endif">
                 <div class="container">
                     <h1>Contact Section</h1>
                     <h2>@if(!empty($general['contact_capt'])){{$general['contact_capt']}} @endif</h2>

                 </div>
             </div></header>
        
       
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

                    <div class="container">

                        <form class="well form-horizontal" action="{{'/contact'}}" method="post"  id="contact_form">
                            {{csrf_field()}}
                            <fieldset>

                                @if (session()->has('flash_notification.message'))
                                    <div class="alert alert-{{ session('flash_notification.level') }}">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                        {!! session('flash_notification.message') !!}
                                    </div>
                            @endif


                                <!-- Form Name -->
                                <legend>Contact Us Today!</legend>

                                <!-- Text input-->

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input  name="name" placeholder="Name" class="form-control"  type="text">
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input-->

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Subject</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                            <input  name="subject" placeholder="Subject" class="form-control"  type="text">
                                        </div>
                                    </div>
                                </div>



                                <!-- Text input-->

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Message</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                            <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Success message -->
                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
            </div><!-- /.container -->


                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-7 padding">
                   
                            </div>
                       
                </form>
            </div>
         <div class="col-md-2"></div>

        </div>
    
    
    </div>
    
    
    
    
    
    
   
    

    
    
<script src="{{url('/js/jquery.js')}}"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="{{url('/js/bootstrap.js')}}"></script>
    </body>





</html>