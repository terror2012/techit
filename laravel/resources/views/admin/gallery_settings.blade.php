<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title class="tittle">Gallery Settings</title>

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
                    <a href="index.blade.php"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>
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
                        <h1><span class="glyphicon glyphicon-picture"></span>  Gallery Settings</h1>
                        <hr />

                        @if (session()->has('flash_notification.message'))
                            <div class="alert alert-{{ session('flash_notification.level') }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                {!! session('flash_notification.message') !!}
                            </div>
                            <hr />
                        @endif

                        <table class="table">

                            <!-- /extra icons -->
                            <thead class="thead-inverse">
                            <tr>

                                <th>ID</th>
                                <th>Slider</th>
                                <th>Caption</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($gallery))
                                @foreach($gallery as $g)
                                    <tr>
                                        <th scope="row">{{$g->id}}</th>
                                        <td><img width="256" height="256" src="{{url($g->slider)}}"/></td>
                                        <td>{{$g->caption}}</td>
                                        <td> <a href="{{url('/admin/gallery/delete/'.$g->id)}}"><span class="fa fa-trash">Delete</span></a></td>
                                        </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        <hr />

                        <div class="form-group">
                            <label for="preview">Preview Uploaded Image</label>
                            <img id="preview" src="" width="256" height="256" alt="preview"/>
                        </div>


                        <form action="{{url('/admin/gallery/add')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <H1>Gallery Slider</H1>
                        <input type="file" name="gallery_add" id="gallery_add" onchange="previewImage('preview', 'gallery_add')" title="Search for a file to add">
                        
                        <hr />
                        
                        
                        <h1>Slider Caption</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea rows="10" cols="100" class="form-control" name="slider-caption" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>
                        </div>
                            
                    </div>
                        </form>
                        <hr />



                        <form action="{{url('/admin/gallery/landingChange')}}" method="post">
                            {{csrf_field()}}
                        <h1>Landing Page Description Title</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea rows="1" name="landingTitle" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">{{$g['landing_title']}}</textarea>
                        
                        <h1>Landing Page Description</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea rows="10" name="landingDescription" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">{{$g['landing_desc']}}</textarea>
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        </form>
                        <hr />
                            <!-- About us Jumbotron -->
                        <form action="{{url('/admin/gallery/aboutChange')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="preview">Preview Uploaded Image</label>
                                <img id="previewAb" src="{{url($g['about_img'])}}" width="256" height="256" alt="preview"/>
                            </div>

                             <H1>About Us Top Cover</H1>
                        <input type="file" name="about_add" id="about_add" onchange="previewImage('previewAb', 'about_add')" title="Search for a file to add">
                        
                        <hr />
                        
                        
                        <h1>About Us Top Caption</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea name="AboutCaption" rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">{{$g['about_capt']}}</textarea>
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>
                        </div>
                            
                    </div>
                        </form>
                    <hr />
                            
                            <!-- Comments Jumbotron -->
                        <form action="{{url('/admin/gallery/commentChange')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="preview">Preview Uploaded Image</label>
                                <img id="previewCm" src="{{url($g['comment_img'])}}" width="256" height="256" alt="preview"/>
                            </div>

                             <H1>Comments Top Cover</H1>
                        <input type="file" id="comment_add" name="comment_add" onchange="previewImage('previewCm', 'comment_add')" title="Search for a file to add">
                        
                        <hr />
                        
                        
                        <h1>Comments Top Caption</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea name="commCaption" rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">{{$g['comment_capt']}}</textarea>
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>
                        </div>
                            
                    </div>
                        </form>

                        <hr/>

                  <!-- Contact Jumbotron -->
                        <form action="{{url('/admin/gallery/contactChange')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="preview">Preview Uploaded Image</label>
                                <img id="previewCt" src="{{url($g['contact_img'])}}" width="256" height="256" alt="preview"/>
                            </div>

                             <H1>Contact Top Slider</H1>
                        <input type="file" id="contact_add" name="contact_add" onchange="previewImage('previewCt', 'contact_add')" title="Search for a file to add">
                        
                        <hr />
                        
                        
                        <h1>Contact Top Caption Caption</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="contactCaption" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">{{$g['contact_capt']}}</textarea>
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>
                        </div>
                            
                    </div>
                        </form>

                        <hr />
                            
                <!-- HowTo Jumbotron -->

                        <form action="{{url('/admin/gallery/howtoChange')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="preview">Preview Uploaded Image</label>
                                <img id="previewHT" src="{{url($g['howto_img'])}}" width="256" height="256" alt="preview"/>
                            </div>

                         <H1>HowTo Top Slider</H1>
                        <input type="file" id="how_to_add" name="how_to_add" onchange="previewImage('previewHT', 'how_to_add')" title="Search for a file to add">
                        
                        <hr />
                        
                        
                        <h1>HowTo Top Caption</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea name="HTcaption" rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">{{$g['howto_capt']}}</textarea>
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>
                        </div>
                            
                    </div>
                        </form>
                        <hr />
                            
                            <!-- My Account Jumbotron -->
                        <form action="{{url('/admin/gallery/myaccChange')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="preview">Preview Uploaded Image</label>
                                <img id="previewMA" src="{{url($g['myacc_img'])}}" width="256" height="256" alt="preview"/>
                            </div>

                             <H1>My Account Top Cover</H1>
                        <input type="file" id="my_account_add" name="my_account_add" onchange="previewImage('previewMA', 'my_account_add')" title="Search for a file to add">
                        
                        <hr />
                        
                        
                        <h1>My Account Top Caption</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea name="myAccCaption" rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">{{$g['myacc_capt']}}</textarea>
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>
                        </div>
                            
                    </div>
                        </form>

                        <hr />
                    
                <!-- Schedule Jumbotron -->
                        <form action="{{url('/admin/gallery/scheduleChange')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="preview">Preview Uploaded Image</label>
                                <img id="previewSC" src="{{url($g['schedule_img'])}}" width="256" height="256" alt="preview"/>
                            </div>

                             <H1>Schedule Top Cover</H1>
                        <input type="file" id="schedule_add" name="schedule_add" onchange="previewImage('previewSC', 'schedule_add')" title="Search for a file to add">
                        
                        <hr />
                        
                        
                        <h1>Schedule Top Caption</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea name="scheduleCaption" rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">{{$g['schedule_capt']}}</textarea>
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>
                        </div>
                            
                    </div>
                        </form>
                        <hr />
                        
                    <!-- Services Jumbotron -->
                        <form action="{{url('/admin/gallery/serviceChange')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="preview">Preview Uploaded Image</label>
                                <img id="previewSV" src="{{url($g['service_img'])}}" width="256" height="256" alt="preview"/>
                            </div>

                             <H1>Services Top Cover</H1>
                        <input type="file" id="service_add" name="service_add" onchange="previewImage('previewSV', 'service_add')" title="Search for a file to add">
                        
                        <hr />
                        
                        
                        <h1>Services Top Caption</h1>
                        <div class="control-group form-group">
                        <div class="controls">
                            <label></label>
                            <textarea name="serviceCaption" rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none">{{$g['service_capt']}}</textarea>
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>
                        </div>
                            
                    </div>
                        </form>

                        <hr />
                            
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

                            <script>
                                function previewImage(image, id)
                                {
                                    var preview = document.querySelector('#' + image);
                                    var file = document.querySelector('#'+id).files[0];
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
