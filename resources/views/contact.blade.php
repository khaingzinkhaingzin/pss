@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')

<style>
	.contact {
		background: linear-gradient(0deg, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)),url('{{ asset("image/winter_snow.jpg") }}') no-repeat;
		background-size: cover;
		background-attachment: fixed;
		/*color: white;*/
	}

	.contact-p, .contact-h {
		font-family: 'ale';
	}

	.contact-p {
		font-size: 25px;
	}
</style>

<div class="container-fluid contact pt-5 pb-5">
	<div class="row">
		<div class="col-md-4">
			<h3 class="contact-h text-center">CONTACT INFO</h3>
			<div class="heading-b text-center pb-2">
				<img src="{{ asset('image/border.png') }}" alt="" style="width: 230px";>
			</div>
			<p class="mt-4 contact-p text-justify">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
			Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque la udantium, totam rem aperiam .</p>

			<h6>The Company Name Inc.</h6>
			<h6>9870 St Vincent Place,</h6>
			<h6>Glasgow, DC 45 Fr 45.</h6>
			<h6>FAX: +1 800 889 9898</h6>
			
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<h3 class="contact-h text-center">CONTACT FORM</h3>
			<div class="heading-b text-center pb-2">
				<img src="{{ asset('image/border.png') }}" alt="" style="width: 230px";>
			</div>
			<div class="row">
				<form action="" class="mt-4">
					<div class="form-group row m-0">
						<input class="col-md-4" type="text" id="name" placeholder="Name:" name="name">
						<input class="col-md-4 mt-1 mb-1" type="email" id="email" placeholder="Email:" name="email">
						<input class="col-md-4" type="text" id="phone" placeholder="Phone:" name="phone">
					</div>
					<textarea class="mt-3 form-control" placeholder="Message:" rows="8" cols="5"></textarea>
					<button type="submit" class="mt-3 btn btn-danger">SEND</button>
					<button type="submit" class="mt-3 btn btn-danger">CLEAR</button>
				</form>
			</div>
		</div>			
	</div>		

	<div class="row text-center mt-3 pb-5">
		<div class="col-md-3">
			<div class="mt-4 contact-div">
				<div class="mt-4 contact-h">
					<h5><i class="fa fa-phone-square"></i> CALL ME</h5>
					<h6>(+09)455 564 160</h6>
					<h6>(+09)455 564 160</h6>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="mt-4 contact-div">
				<div class="mt-4 contact-h">
					<h5><i class="fa fa-envelope"></i> SEND A MESSAGE</h5>
					<h6>info@email.com</h6>
					<h6>admin@email.com</h6>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="mt-4 contact-div contact-h">
				<div class="mt-4">
					<h5><i class="fa fa-home"></i> VISIT ME</h5>
				<h6>Street 227,Ismailia,Egypt</h6>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="mt-4 contact-div contact-h">
			<div class="mt-4">
				<h5><i class="fa fa-clock-o"></i> WORK TIME</h5>
				<h6>Sat-Wed : 07.00 - 16.00</h6>
				<h6>Thursday:08.00 - 14.00</h6>
			</div>
		</div>
	</div>
</div>

@endsection