<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title class="tittle">Add Service</title>

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
                <a href="{{url('/admin/')}}">
                    <img src="{{url('/admin_assets/img/logo.png')}}" width="230" height="50" alt="">
                </a>

            </li>
            <li class="item">
                <a href="{{ URL::previous() }}"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
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
    <div id="page-content-wrapper">m
        <div class="container-fluid">
            <div class="row">
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                <div class="col-lg-12">
                    <h1><span class="glyphicon glyphicon-pencil"></span> Add Service</h1>
                </div>


                <div class="col-md-10" id="tourpackages-carousel">
                    <!-- Title -->
                    <form action="{{url('/admin/add_service')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <h2><strong>Title</strong></h2>
                        <div class="form-group">
                            <label for="usr">Enter The Title of The Service</label>
                            <input type="text" class="form-control" id="usr" name="title" value="">
                        </div>
                        <h2><strong>Youtube Video Link</strong></h2>
                        <div class="form-group">
                            <label for="link">Youtube Video Link</label>
                            <input type="text" class="form-control" name="link" id="link" value=""/>
                        </div>
                        <div class="form-group">
                            <label for="section">Section ID</label>
                            <input type="text" class="form-control" name="section" id="section" value=""/>
                        </div>
                        <!-- Title End -->





                        <!-- Upload Thumbnail -->
                        <div class="form-group">
                            <label for="preview">Preview Uploaded Image</label>
                            <img id="preview" src="" width="256" height="256" alt="preview"/>
                        </div>
                        <div class="upload_content">
                            <h2><strong>Upload Service Thumbnail</strong></h2>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="file" onchange="previewImage()" name="files" id="js-upload-files" multiple>
                            </div>

                        </div>


                        <div class="row">
                            <!-- Upload Thumbnail End -->

                            <!-- Video Link -->
                            <!-- <h2><strong>Video Link</strong></h2>
                             <div class="form-group">
                             <label for="usr">Insert the URL here</label>
                             <input type="text" class="form-control" id="usr">
                           </div>
                                     -->
                            <!-- Video Link End -->

                            <!-- Author -->
                            <!--  <h2><strong>Author</strong></h2>
                                   <div class="form-group">

                            <input type="text" class="form-control" id="usr">
                          </div>
                                    <!-- Author End -->
                            <!-- Description -->
                            <h2><strong>Description</strong></h2>

                            <div class="form-group">
                                <label for="exampleTextarea">Enter Description Here</label>
                                <textarea class="form-control" id="exampleTextarea" name="description" rows="8"></textarea>
                            </div>

                            <!-- Description End -->

                            <p><button type="submit" class="btn btn-info btn-lg">Submit</button>
                                <a href="{{url('/admin/service')}}" class="btn btn-danger btn-lg" role="button">Discard</a></p>
                        </div>
                    </form>




                </div><!-- End row -->




            </div><!-- End container -->



        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
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

<script>
    function previewImage()
    {
        var preview = document.querySelector('#preview');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function() {
            preview.src = reader.result;
        }, false);
        if(file)
        {
            reader.readAsDataURL(file);
        }
    }
</script>

</body>

</html>
