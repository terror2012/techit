<!DOCTYPE html>
<html>
    <head>
        <title>How To</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{url('/css/contact.css')}}"/>
    </head>

<body>
   
   @include('layouts/navbar')

   <div class="jumbotron" style="@if(!empty($gen['howto_img']))background-image: url('{{url($gen['howto_img'])}}') @endif">
       <div class="container">
           <h1>How To</h1>
           <h2>@if(!empty($gen['howto_capt'])){{$gen['howto_capt']}} @endif</h2>


       </div>


   </div>


      <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<h3 class="text-center">
				<strong>How To Tips</strong>
			</h3>
			<div class="row">

                <select id="sections" style="color: black;" onchange="updatehowto()">
                    @if(!empty($sections))
                        @foreach($sections as $s)
                        <option value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach
                        @endif
                </select>
                <br>
                <br>
<div id="howToStuff">
                @if(!empty($how_to))

					@foreach($how_to as $how)

                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="Bootstrap Thumbnail First" src="{{$how->thumbnail}}" />
                                <div class="caption">
                                    <h3>
                                        {{$how->title}}
                                    </h3>
                                    <p>
                                        <i>{{$how->author}}</i>

                                    </p>
                                    <p> <strong>{{$how->description}}</strong></p>

                                    <p>
                                        <a style="color: black" class="btn btn-primary btn-lg" onclick="modalStart('{{$how->youtube_url}}')" href="#">Play Video</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <span>Watch How To Video</span>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe width="400" height="300" frameborder="0" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

				@endif

</div>
			</div>
		</div>
	</div>
          @if(Auth::check())
              <div class="row" style="text-align: center;">
                  <h1>Add New How To</h1>
                  <form action="{{url('howto/submit')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                          <label for="title">HowTo Title</label>
                          <input type="text" id="title" name="title" class="form-control" placeholder="Insert How To Title Here"/>
                      </div>
                      <div class="form-group">
                          <img id="preview" src="" width="256" height="256"/>
                          <input type="file" name="photo" id="photo" onchange="previewImage()"/>
                      </div>
                      <div class="form-group">
                          <label for="description">HowTo Description</label>
                          <textarea id="description" name="description" class="form-control" rows="5" placeholder="Insert How To Description Here"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="link">HowTo Youtube Link</label>
                          <textarea id="link" name="link" class="form-control" rows="5" placeholder="Insert How To Description Here"></textarea>
                      </div>
                      <input type="hidden" id="sectionID" name="sectionID" value="1"/>
                      <button type="submit" class="btn btn-lg btn-info">Add New How To</button>
                  </form>
              </div>
              @endif
</div>
  
    
    
    
    
   
    

    
    
<script src="js/jquery.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>

<script>

    function updatehowto()
    {
        var id = document.getElementById('sections').value;
        $('#howToStuff').empty();
        $.ajax({
            url: "{{url('/how_to_ajax')}}" + "/" + id,
            success: function(result)
            {
                var data = JSON.parse(result);
                $.each(data, function(i, item) {
                    $('#howToStuff').append('<div class="col-md-4"><div class="thumbnail"><img alt="Bootstrap Thumbnail" src="' + data[i].thumbnail +'">' +
                        '<div class="caption"> <h3>'+ data[i].title + '</h3> <p> <i>' + data[i].author + '</i></p><p><strong>' + data[i].fulltext + '</strong>' +
                        '</p><p><a style="color: black;" class="btn btn-primary btn-lg" href="' + data[i].youtube_url +'">Play Video </a></p></div></div></div>');
                })
            }
        })
        $('#sectionID').val(id);
    }

    function modalStart(src)
    {
        $('#myModal').modal('show');
        $('#myModal iframe').attr('src', src);
    }
    $('#myModal').on('hidden.bs.modal', function(){
        $('#myModal iframe').removeAttr('src');
    });

    function previewImage()
    {
        var preview = document.querySelector('#preview');
        var file = document.querySelector('#photo').files[0];
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