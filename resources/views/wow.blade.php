<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 bg-danger text-center">
				<div class="wow slideInLeft" data-wow-duration="2s">
				    Content to Reveal Here
			    </div>			
			</div>
			<div class="col-md-6 bg-danger text-center">
				<div class="wow slideInRight" data-wow-duration="2s">
				    Content to Reveal Here
			    </div>
			</div>
		</div>
	</div>
	

	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/wow.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script>
      new WOW().init();
    </script>
</body>
</html>