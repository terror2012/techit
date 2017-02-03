<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>404</title>

		<link rel="stylesheet" href="{{url('/404_assets/css/style.css')}}" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,700' rel='stylesheet' type='text/css' />
		
		<script type="text/javascript" src="{{url('/404_assets/js/jquery.js')}}"></script>
		<script type="text/javascript" src="{{url('/404_assets/js/introtzikas.js')}}"></script>
		<script type="text/javascript" src="{{url('/404_assets/js/script.js')}}"></script>
		<script type="text/javascript">
			//<![CDATA[
				$(document).ready(function() {
					$().introtzikas({
							line: 'white', 
							speedwidth: 2000, 
							speedheight: 1000, 
							bg: '#474747',
							lineheight: 2
					});	
				});
			//]]>
		</script>
</head>

<body>

	<img src="{{url('/404_assets/images/bg2.jpg')}}" id="bg" alt="" /><!-- Background image -->
	<div class="bg_overlay"></div><!-- Pattern -->
	
		<div id="wrap">
			<div id="block">
				<div id="content">
					<div class="top_img">
						<div class="img_eror"></div>
					</div>
					<div class="text_eror">
						<h1>"Ooops! Page not found..."</h1>
						<p>Please Return back to our <a href="{{url('/')}}">Home Page</a>. Thank you for visiting our Website.</p>
					</div>
					
					
				</div>
			</div>
		</div>

</body>
</html>