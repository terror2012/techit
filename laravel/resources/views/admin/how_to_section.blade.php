<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Section View</title>

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
                <a href="{{url('/admin/how_to')}}"><span class="glyphicon glyphicon-chevron-left"></span>Manage HowTo</a>
            </li>
            <li class="item">
                <a href="{{url('/admin/how_to/section/add')}}"><span class="glyphicon glyphicon-pencil"></span>Add Section</a>
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
                <a href="{{url('/admin/payments')}}">All Payments</a>
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
                    <h1 class="tittle"><span class="glyphicon glyphicon-calendar">How To Sections</span></h1>


                    @if (session()->has('flash_notification.message'))
                        <div class="alert alert-{{ session('flash_notification.level') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                            {!! session('flash_notification.message') !!}
                        </div>
                    @endif

                    <table class="table">

                        <!-- /extra icons -->
                        <thead class="thead-inverse">
                        <tr>

                            <th>ID</th>
                            <th>Name</th>
                            <th>HowTo Count</th>
                            <th>Visible</th>
                            <th>Created At</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                        @if(!empty($section))
                            @foreach($section as $s)
                                <tr>
                                    <th scope="row">{{$s['id']}}</th>
                                    <td>{{$s['name']}}</td>
                                    <td>{{$s['count']}}</td>
                                    <td>{{$s['visible']}}</td>
                                    <td>{{$s['created']}}</td>
                                    <td><a href="{{url('/admin/how_to/edit_section/'.$s['id'])}}"><span class="fa fa-pencil">Edit Section</span></a>      @if($s['visible'] == '0') <a href="{{url('/admin/how_to/activate/'.$s['id'])}}"><span class="fa fa-eye">Activate Section</span></a> @else <a href="{{url('/admin/how_to/deactivate/'.$s['id'])}}"><span class="fa fa-eye-slash">Deactivate Section</span></a> @endif <a href="{{url('/admin/how_to/delete_section/'.$s['id'])}}"><span class="fa fa-trash">Delete Section</span></a></td>
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
