<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title class="tittle">Edit Sections</title>

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
                <a href="{{URL::previous()}}"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
            </li>

            <hr />
            <li class="item">
                <a href="{{url('/admin/how_to')}}">HowTo Settings</a>

            </li>
            <li class="item">
                <a href="{{url('/admin/gallery')}}">Gallery Settings</a>

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
                    <h1><span class="glyphicon glyphicon-pencil"></span> Section Manager</h1>
                </div>

        <form action="{{url('/admin/edit_section/'.$section['id'])}}" method="Post">
            {{csrf_field()}}
                <div class="col-md-10" id="tourpackages-carousel">
                    <!-- Title -->
                    <h2><strong>Section Name</strong></h2>
                    <div class="form-group">
                        <label for="usr">Enter The Section Name</label>
                        <input type="text" class="form-control" name="name" id="usr" value="{{$section['name']}}">


                    </div>
                        <h2><strong>Services for this section</strong></h2>

                        <div class="form-group">
                            <label for="services">Enter the IDs of the services, separated by ","</label>
                            <input type="text" class="form-control" name="services" id="services" value="{{$section['services']}}"/>
                        </div>

                        <!-- Description End -->

                        <p><button type="submit" class="btn btn-info btn-lg">Submit</button>
                            <a href="#" class="btn btn-danger btn-lg" role="button">Discard</a></p>
                    </div><!-- End row -->
            </form>
                </div><!-- End container -->



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