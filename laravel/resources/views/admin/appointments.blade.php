<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Appointments</title>

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
                    <a href="{{url('/admin/clients')}}">Clients</a>
                </li>
                <li class="item">
                    <a href="{{url('/admin/appointments')}}">Total appointments</a>
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
                        <h1 class="tittle"><span class="glyphicon glyphicon-calendar">Appointments</span></h1>
                        
                        <table class="table">
                           
                          <!-- /extra icons -->  
  <thead class="thead-inverse">
    <tr>

        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Address</th>
        <th>Reminders</th>
        <th>Full Payment</th>
        <th>Actions</th>
    
    </tr>
  </thead>
  <tbody>
  @if(!empty($history))
      @foreach($history as $h)
          <tr>
              <th scope="row">{{$h->id}}</th>
              <td>{{$h->name}}</td>
              <td>{{$h->solved_at}}</td>
              <td>{{$h->address}}</td>
              <td>{{$h->reminders}}</td>
              <td>{{$h->paid}}</td>
              <td><a href="{{url('/admin/view_archieve/'.$h->id)}}"><span class="fa fa-archive">View Archieve</span></a></td>

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
