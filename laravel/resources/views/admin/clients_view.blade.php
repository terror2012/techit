<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Client Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../admin_assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../admin_assets/css/simple-sidebar.css" rel="stylesheet">

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
                    <a href="#">
                        <img src="../../admin_assets/img/logo.png" width="230" height="50" alt="">
                    </a>
                    
                </li>
                <li class="item">
                    <a href="content_manager.blade.php">Invoice List</a>
                </li>
                <li class="item">
                    <a href="content_manager.blade.php">Clients</a>
                </li>
                <li class="item">
                    <a href="content_manager.blade.php">Total appointments</a>
                </li>
                
                
                <hr />
                <li class="item">
                    <a href="content_manager.blade.php"><span class="glyphicon glyphicon-folder-open"></span> Content Manager</a>
                </li>
                <li class="item">
                    <a href="invoices.blade.php"><span class="glyphicon glyphicon-calendar"></span> Schedule</a>
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
                        <h1><span class="glyphicon glyphicon-eye-open"></span> Client Page</h1>
                        <hr />

                        <h2><strong>Name:</strong>   {{$client['name']}} </h2>
                        <hr />
                        <h2><strong>Preferred Method of Contact:</strong>   {{$client['prefered']}}</h2>
                        <hr />
                        <h2><strong>Phone Number:</strong>   {{$client['phone']}} </h2>
                        <hr />
                        <h2><strong>Email:</strong>     {{$client['email']}}</h2>
                        <hr />
                        <h2><strong>Adress:</strong>    {{$client['address']}}</h2>
                        <hr />
                        
                        <h1><stron>Appointments</stron></h1>
                        
                        <table class="table">
                           
                          <!-- /extra icons -->  
  <thead class="thead-inverse">
    <tr>
        
     
      <th>Invoice #</th>
        <th>Value</th>
        <th>Payment</th>
      <th>Date</th>
      <th>Time</th>
    <th>Issue</th>
    <th>Actions</th>
    </tr>
  </thead>
  <tbody>

  @if(!empty($appoint))
      @foreach($appoint as $ap)
          <tr>
              <th scope="row">{{$ap['id']}}</th>
              <td>{{$ap['price']}}</td>
              <td>{{$ap['paid']}}</td>
              <td>{{$ap['date']}}</td>
              <td>{{$ap['time']}}</td>
              <td><p>{{$ap['issue']}}</p></td>

              <td>
                  <button class="btn-sm btn-danger text-center"><strong>Delete Appointment</strong></button>
              </td>
              <td></td>
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
    <script src="../../admin_assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../admin_assets/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
