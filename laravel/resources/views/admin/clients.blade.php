<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clients</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('/admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('/admin_assets/css/simple-sidebar.css')}}" rel="stylesheet">

    <link href="{{url('/css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

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
    
    </style>
    

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{url('/admin')}}">
                        <img src="{{url('/admin_assets/img/logo.png')}}" width="230" height="50" alt="">
                    </a>
                    
                </li>
                <li class="item">
                    <a href="{{URL::previous()}}"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>
                </li>
                
                
                <hr />
                <li class="item">
                    <a href="{{url('/admin/invoices')}}">Invoice List</a>
                </li>
                
                <li class="item">
                    <a href="{{url('/admin/appointments')}}">Total Appointments</a>
                </li>
                <li class="item">
                    <a href="{{url('/admin/payments')}}">All payments</a>
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
                        <h1 class="tittle"><span class="glyphicon glyphicon-user"> Clients</span></h1>

                        @if (session()->has('flash_notification.message'))
                            <div class="alert alert-{{ session('flash_notification.level') }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                {!! session('flash_notification.message') !!}
                            </div>
                    @endif
                  <!-- extra icons -->
                       
                        <table class="table">
                           
                          <!-- /extra icons -->  
  <thead class="thead-inverse">
    <tr>
        
      <th>ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Contact Preference</th>
      <th>Actions</th>
    
    </tr>
  </thead>
  <tbody>
    @if(!empty($client))
        @foreach($client as $c)
            <tr>
                <th scope="row">{{$c->id}}</th>
                <td>{{$c->first_name}} {{$c->last_name}}</td>
                <td>{{$c->phone}}</td>
                <td>{{$c->email}}</td>
                <?php
                        switch($c->contact)
                            {
                            case 1:
                                $preference = 'email';
                                break;
                            case 2:
                                $preference = 'phone';
                                break;
                            case 3:
                                $preference = 'text';
                                break;
                        }
                        ?>
                <td>{{$preference}}</td>
                <td><a href="{{url('/admin/message/'.$c->id)}}"><span class="glyphicon glyphicon-envelope">Email</span></a>   <a href="{{url('/admin/view_client/'.$c->id)}}"><span class="fa fa-eye">View</span></a>@if($c->status == '1') <span class="fa fa-ban"><a href="{{url('/admin/ban_client/'.$c->id)}}">Ban Client</a></span> @else <span class="fa fa-user"><a href="{{url('/admin/unban_client/'.$c->id)}}">UnBan Client</a></span> @endif</td>
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
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{url('/admin_assets/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('/admin_assets/js/bootstrap.min.js')}}"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
