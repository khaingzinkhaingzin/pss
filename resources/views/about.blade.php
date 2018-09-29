@extends('layouts.master')

@section('title', 'About Page')

@section('content')

<style>

	body {
		background: linear-gradient(0deg, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)),url('{{ asset("image/winter_snow.jpg") }}') no-repeat;
		background-size: cover;
		background-repeat: no-repeat;
		background-attachment: fixed;
		/*color: white;*/
	}

	@font-face {
	    font-family: 'cour';
	    src: url('{{ asset("fonts/googlefonts/Courgette-Regular.ttf") }}');
	}

	.about-h {
		font-family: 'cour';
	}

	.about-p {
		font-family: 'ale';
		font-size: 20px;
	}

</style>

<div class="container">
	<div class="row mt-5">
		<div class="col-md-8">
			<h4 class="about-h text-center">About Our Shop</h4>
			<div class="heading-b text-center pb-3">
				<img src="{{ asset('image/border.png') }}" alt="" style="width: 250px";>
			</div>
			<p class="mt-4 about-p">Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.  Etiam rhoncus.Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus..Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
			
		</div>
		<div class="col-md-4">
			<div class="carousel slide" data-ride="carousel" data-interval="1000" id="mySlide">
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img src="{{ asset('image/ourstore3.jpg') }}" alt="">
					</div>
					<div class="carousel-item">
						<img src="{{ asset('image/ourstore3.jpg') }}" alt="">
					</div>
					<div class="carousel-item">
						<img src="{{ asset('image/ourstore3.jpg') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-5 mb-5">
		<div class="col-md-4">
			<h4 class="about-h">OUR MISSION</h4>
			<div class="heading-b pb-3">
				<img src="{{ asset('image/border.png') }}" alt="" style="width: 150px";>
			</div>
			<p class="mt-4 about-p">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.Maecenas nec odio et ante tincidunt tempus. </p>
			<a href="">Read More ...</a>
		</div>
		<div class="col-md-4">
			<h4 class="about-h">OUR SERVICES</h4>
			<div class="heading-b pb-3">
				<img src="{{ asset('image/border.png') }}" alt="" style="width: 160px";>
			</div>
			<ul class="mt-4 about-p">
				<li>Curabitur ullamcorper
				<li>Aenean vulputate eleifend</li>
				<li>Sed fringilla mauris</li>
				<li>Cum sociis natoque</li>
				<li>et ante tincidunt tempus</li>
			</ul>
		</div>
		<div class="col-md-4">
			<h4 class="about-h">OUR BENEFIT</h4>
			<div class="heading-b pb-3">
				<img src="{{ asset('image/border.png') }}" alt="" style="width: 160px";>
			</div>
			<ul class="mt-4 about-p">
				<li>Curabitur ullamcorper
				<li>Aenean vulputate eleifend</li>
				<li>Sed fringilla mauris</li>
				<li>Cum sociis natoque</li>
				<li>et ante tincidunt tempus</li>
			</ul>
		</div>
	</div>
	
	<h4 class="about-h text-center">OUR TEAM</h4>
	<div class="heading-b text-center pb-3">
		<img src="{{ asset('image/border.png') }}" alt="" style="width: 180px"; style="width: 120px;height: 120px;">
	</div>
	<div class="row pt-4 mb-5 text-center">
		<div class="col-md-3">
			<img class="rounded-circle mb-2" src="{{ asset('/image/about/u3.png') }}" style="width: 120px;height: 120px;">
			<h6>Soe Moe Thu</h6>
		</div>
		<div class="col-md-2">
			<img class="rounded-circle mb-2" src="{{ asset('/image/about/u2.png') }}" style="width: 120px;height: 120px;">
			<h6>Khaing Thazin</h6>
		</div>
		<div class="col-md-2">
			<img class="rounded-circle mb-2" src="{{ asset('/image/about/u1.png') }}" style="width: 120px;height: 120px;">
			<h6>Shwe Yee Moe Oo</h6>
		</div>
		<div class="col-md-2">
			<img class="rounded-circle mb-2" src="{{ asset('/image/about/u2.png') }}" style="width: 120px;height: 120px;">
			<h6>Ei Phyu Zaw</h6>
		</div>
		<div class="col-md-3">
			<img class="rounded-circle mb-2" src="{{ asset('/image/about/u1.png') }}"
			style="width: 120px;height: 120px;">
			<h6>Hnin Nu Wai</h6>
		</div>
	</div>

</div>

@stop