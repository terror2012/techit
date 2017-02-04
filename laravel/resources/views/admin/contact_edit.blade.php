<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Contact Info</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('/admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('/admin_assets/css/simple-sidebar.css')}}" rel="stylesheet">

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
                    <a href="{{url('/admin/invoices')}}">Invoice List</a>
                </li>
                <li class="item">
                    <a href="{{url('/admin/clients')}}">Clients</a>
                </li>
                <li class="item">
                    <a href="{{url('/admin/appointments')}}">Total appointments</a>
                </li>


                <hr />
                <li class="item">
                    <a href="{{url('/admin/content_manager')}}"><span class="glyphicon glyphicon-folder-open"></span> Content Manager</a>
                </li>
                <li class="item">
                    <a href="{{url('/admin/schedules')}}"><span class="glyphicon glyphicon-calendar"></span> Schedule</a>
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
                        <h1><span class="glyphicon glyphicon-pencil"></span> Edit Contact Details</h1>
                        <hr />
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <form action="{{url('/admin/changePhone')}}" method="POST">
                                    {{csrf_field()}}
                            <div class="text-center phone_number">
                        <h2><strong>Change Phone Number</strong></h2>
                           <input type="text" class="form-control" id="phone_edit" name="phone_edit" aria-controls="number" placeholder="Enter The New Phone Number" value="@if(!empty($general['phone'])){{$general['phone']}} @endif">
                                <button type="submit" class="btn-lg btn-primary change_phone"><span class="glyphicon glyphicon-ok"></span><strong> Change Phone Number</strong></button>
                                </div>
                                </form>
                                <form action="{{url('/admin/changeEmail')}}" method="POST">
                                    {{csrf_field()}}
                                <div class="text-center email_edit">
                                <h2><strong>Change Email Adress</strong></h2>
                                <input type="email" class="form-control" id="email" name="email" aria-controls="email-helper" placeholder="Enter The New Email Adress" value="@if(!empty($general['email'])){{$general['email']}} @endif">
                                    <button type="submit" class="btn-lg btn-primary change_mail"><span class="glyphicon glyphicon-ok"></span><strong> Change Email Addres</strong></button>
                                </div>
                                </form>
                                <form action="{{url('/admin/changeHours')}}" method="POST">
                                    {{csrf_field()}}
                                <div class="text-center hours_edit">
                                <h2><strong>Change Business Hours</strong></h2>
                                    <input type="text" class="form-control" id="hours_edit" name="hours_edit" placeholder="Enter The Business Hours" value="@if(!empty($general['hours'])){{$general['hours']}} @endif">
                                    <button type="submit" class="btn-lg btn-primary change_hours"><span class="glyphicon glyphicon-ok"></span><strong> Change Business Hours</strong></button>
                                </div>
                                </form>
                                <form action="{{url('/admin/changeDays')}}" method="POST">
                                    {{csrf_field()}}
                                <div class="text-center days_edit">
                                <h2><strong>Change Business Days</strong></h2>
                                    <input type="text" class="form-control" id="days_edit" name="days_edit" placeholder="Enter The Business Days" value="@if(!empty($general['days'])){{$general['days']}} @endif">
                                    <button type="submit" class="btn-lg btn-primary change_days"><span class="glyphicon glyphicon-ok"></span><strong> Change Business Days</strong></button>
                       </div>
                                </form>
                            </div>
                            </div>
                        
                        
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
