<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title class="tittle"><span class="glyphicon glyphicon-folder-open"></span> Content Manager</title>

    <!-- Bootstrap Core CSS -->
    <link href="../admin_assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../admin_assets/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <style>
        .item { padding-top: 20px; font-size: 1.5em;}
        .sidebar-brand {padding-top: 10px; padding-bottom: 10px;}
        #preview{height: 256px;}
    </style>
    

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{url('/admin/')}}">
                        <img src="../admin_assets/img/logo.png" width="230" height="50" alt="">
                    </a>
                    
                </li>
                <li class="item">
                    <a href="{{ url('/admin/') }}"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
                </li>
                <li class="item">
                
                <a href="{{url('/admin/add_service')}}"><span class="glyphicon glyphicon-pencil"> Add Service</span></a>
                
                </li>
                <li class="item">

                    <a href="{{url('/admin/section')}}"><span class="glyphicon glyphicon-pencil"> Manage Section</span></a>

                </li>
                <hr />
                 <li class="item">
                    <a href="index.blade.php">General Settings</a>
                    
                </li>
                 <li class="item">
                    <a href="index.blade.php">HowTo Settings</a>
                    
                </li>
                 <li class="item">
                    <a href="index.blade.php">Schedule Settings</a>
                    
                </li>
                 <li class="item">
                    <a href="index.blade.php">Gallery Settings</a>
                    
                </li>
                
               
                
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    <div class="col-lg-12">
                        <h1><span class="glyphicon glyphicon-cog"></span> Services Settings</h1>
                    </div>
                    
                    
                        <div class="container" id="tourpackages-carousel">
      
      <div class="row">
        

        @if(!empty($service))
              @foreach($service as $s)

                  <div class="col-md-3">
                      <div class="thumbnail">
                          <img src="../{{$s->image}}" id="preview" alt="" height="256" width="256">
                          <div class="caption">
                              <h4>{{$s->name}}</h4>

                              <p>{{$s->description}}</p>
                              <p><a href="{{url('/admin/edit_service/'.$s->id)}}" class="btn btn-info btn-xs" role="button">Edit</a> <a href="{{url('/admin/delete_service/'.$s->id)}}" class="btn btn-danger btn-xs" role="button">Delete</a></p>
                          </div>
                      </div>
                  </div>

                  @endforeach
            @endif
          
          
          
        
        
      </div><!-- End row -->
                    
                    
                 
      
    </div><!-- End container -->
                    
                    
                    
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../admin_assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../admin_assets/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
