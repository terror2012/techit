<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Message</title>

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
                    <a href="index.blade.php"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>
                </li>
                
                
                <hr />
                <li class="item">
                    <a href="#">Invoice List</a>
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
                        <h1 class="tittle"><span class="glyphicon glyphicon-envelope"> Email</span></h1>
                  <!-- extra icons -->
                       
                        <table class="table">
                           
                          <!-- /extra icons -->  
 
 <div class="container padding">
     <div class="row">
         <div class="col-md-2"></div>
            <div class="col-md-8">
                    <form action="{{url('/admin/message/'.$id)}}" method="POST">
                        {{csrf_field()}}
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{$email}}" />
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Subject:</label>
                            <input type="text" name="subject"  class="form-control" id="subject" />
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" name="message" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-7 padding">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
            </div>
                    </form>
         <div class="col-md-2"></div>
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
