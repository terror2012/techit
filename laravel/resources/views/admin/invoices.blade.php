<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Invoice</title>

    <!-- Bootstrap Core CSS -->
    <link href="../admin_assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../admin_assets/css/simple-sidebar.css" rel="stylesheet">

    <link href="../css/font-awesome/css/font-awesome.css" rel="stylesheet">

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
                        <img src="../admin_assets/img/logo.png" width="230" height="50" alt="">
                    </a>
                    
                </li>
                <li class="item">
                    <a href="{{URL::previous()}}"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>
                </li>
                
                
                <hr />
                <li class="item">
                    <a href="#">Invoice List</a>
                </li>
                <li class="item">
                    <a href="#">Clients</a>
                </li>
                <li class="item">
                    <a href="#">Total Appointments</a>
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
                        <h1 class="tittle"><span class="glyphicon glyphicon-calendar">Invoice</span></h1>
                  <!-- extra icons -->
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
    @if(!empty($invoice))
        @foreach($invoice as $i)
            <tr>
                <th scope="row">{{$i->id}}</th>
                <td>{{$i->name}}</td>
                <td>{{$i->created_at}}</td>
                <td>{{$i->address}}</td>
                <td>{{$i->reminders}}</td>
                <td>{{$i->paid}}</td>
                <td>@if($i->invoice_sent == '0') <a href="{{url('/admin/send_invoice/'.$i->id)}}"><span class="fa fa-paper-plane">Send Invoice</span></a> @else <a href="{{url('/admin/send_reminder/'.$i->id)}}"><span class="fa fa-paper-plane">Send Reminder</span></a> @endif     <a href="{{url('/admin/archieve/'.$i->id)}}"><span class="fa fa-archive">Archive Appointment</span></a>  <a href="{{url('/admin/view_invoice/'.$i->id)}}"><span class="fa fa-eye">View Invoice</span></a></td>

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
