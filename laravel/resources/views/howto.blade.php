<!DOCTYPE html>
<html>
    <head>
        <title>How To</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/contact.css"/>
    </head>

<body>
   
   @include('layouts/navbar')

   <div class="jumbotron">
       <div class="container">
           <h1>How To</h1>
           <h2>How To Tutorials</h2>


       </div>


   </div>


      <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<h3 class="text-center">
				<strong>How To Tips</strong>
			</h3>
			<div class="row">
				@if(!empty($how_to))

					@foreach($how_to as $how)

                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="Bootstrap Thumbnail First" src="{{$how->thumbnail}}" />
                                <div class="caption">
                                    <h3>
                                        {{$how->title}}
                                    </h3>
                                    <p>
                                        <i>{{$how->author}}</i>

                                    </p>
                                    <p> <strong>{{$how->description}}</strong></p>

                                    <p>
                                        <a class="btn btn-primary" href="#">Play Video</a> <a class="btn" href="#">Read Article</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endforeach

				@endif
			</div>
		</div>
	</div>
</div>
  
    
    
    
    
   
    

    
    
<script src="js/jquery.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
    </body>





</html>