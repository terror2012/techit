<!DOCTYPE html>
<html>
    <head>
        <title>Services</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/services.css"/>
    </head>

<body>
   <!-- Navbar -->
    
    @include('layouts/navbar')
    
   <!-- Jumbotron -->
    <div class="jumbotron">
    <div class="container">
        <h1>Services</h1>
        <h2>We provide Tech Support For Your Gadgets</h2>
        
        
        </div>
    
    
    </div>
    
    <!-- Content -->




        @if(!empty($section))

            @foreach($section as $sec)

                @if($sec->visible == "1")

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <h1 class="text-center"><strong>{{$sec->name}}</strong></h1>
                                <div class="row">
                                    @if(!empty($services))
                                        @foreach($services[$sec->id] as $serv)

                                            <div class="col-md-4">

                                                <div class="thumbnail">
                                                    <img alt="Bootstrap Thumbnail First" src="{{$serv['image']}}" width="600px" height="200px" />
                                                    <div class="caption">
                                                        <h3>
                                                            {{$serv['name']}}
                                                        </h3>
                                                        <p>
                                                            {{$serv['description']}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    </div>


                @endif


            @endforeach

			@endif
    
    
    
    
    
   
    

    
    
<script src="js/jquery.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
    </body>





</html>