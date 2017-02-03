<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Comments</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/Comments.css" rel="stylesheet">
    <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

   @include('layouts/navbar')

    <header><div class="jumbotron jumbotron-fluid jumbotron-schedule">
  <div class="container">
    
    
  </div>
</div></header>

       
       <div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="page-header">
            <h3 class="reviews">Leave your comment</h3>
        </div>
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
            </ul>            
            <div class="tab-content">
                <div class="tab-pane active" id="comments-logout">                
                    <ul class="media-list">

                        @if(! empty($comments))

                            @foreach($comments as $comm)

                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle" src="{{$user_info[$comm['email']]['icon']}}" alt="profile">
                                    </a>
                                    <div class="media-body">
                                        <div class="well well-lg">
                                            <h4 class="media-heading text-uppercase reviews">{{$comm['name']}}</h4>
                                            <ul class="media-date text-uppercase reviews list-inline">
                                                {{$comm['timestamp']}}
                                            </ul>
                                            <p class="media-comment">
                                                {{$comm['message']}}
                                            </p>
                                            <a class="btn btn-info btn-circle text-uppercase" data-toggle="collapse" href="#replyButton{{$comm['id']}}" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                            <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#reply{{$comm['id']}}"><span class="glyphicon glyphicon-comment"></span> @if(!empty($reply[$comm['id']])) {{count($reply[$comm['id']])}} @else 0 @endif comments</a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="replyButton{{$comm['id']}}">
                                        <ul class="media-list">
                                            <li class="media media-replied">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" src="{{$user_info[$comm['email']]['icon']}}" alt="profile">
                                                </a>
                                                <div class="media-body">
                                                    <div class="well well-lg">
                                                        <p class="media-comment">
                                                            <form action="{{url('/add_reply')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="text" id="body" name="body"/>
                                                            <input type="hidden" id="comment_id" name="comment_id" value="{{$comm['id']}}"/>
                                                            <input type="submit" name="reply_submit" id="reply_submit" class="btn btn-info btn-circle text-uppercase" value="Submit"/>
                                                        </form>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="collapse" id="reply{{$comm['id']}}">
                                        <ul class="media-list">
                                            @if(!empty($reply[$comm['id']]))

                                                @foreach($reply[$comm['id']] as $r)

                                                    <li class="media media-replied">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object img-circle" src="{{$user_info[$r['email']]['icon']}}" alt="profile">
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="well well-lg">
                                                                <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> {{$r['name']}} </h4>
                                                                <ul class="media-date text-uppercase reviews list-inline">
                                                                    {{$r['timestamp']}}
                                                                </ul>
                                                                <p class="media-comment">
                                                                    {{$r['body']}}
                                                                </p>
                                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>




                                                 @endforeach



                                            @endif
                                        </ul>
                                    </div>


                            @endforeach

                            @endif

                    </ul> 
                </div>
                <div class="tab-pane" id="add-comment">
                    <form action="{{url('/add_comment')}}" method="post" class="form-horizontal" id="commentForm" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uploadMedia" class="col-sm-2 control-label">Upload media</label>
                            <div class="col-sm-10">                    
                                <div class="input-group">
                                  <div class="input-group-addon">http://</div>
                                  <input type="text" class="form-control" name="uploadMedia" id="uploadMedia">
                                </div>
                            </div>
                        </div>
                        
                     <!-- End of Star Rating -->   
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <input class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"/>
                            </div>
                        </div>            
                    </form>
                </div>
            </div>
        </div>
	</div>
  </div>
 
</div>
       
       
       
       
       
       
       
       
       
       
       
    <!-- Page Content -->
    

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
