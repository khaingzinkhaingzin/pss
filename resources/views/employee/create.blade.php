@extends('layouts.admin_master')

@section('header', "Create a new employee")
@section('content')
	<div class="container">
		<div class="col-md-11">
			@include("error.form_validate_error")
			<form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
				  	<input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
				</div>

				<div class="form-group">
				  	<label for="file">Image</label>
				  	<input type="file" class="form-control" id="file" name="file">
				</div>

				<div class="form-group">
				  	<input type="text" class="form-control" id="nrc" placeholder="Enter your NRC" name="nrc">
				</div>

				<div class="form-group">
				  	<input type="text" class="form-control" id="account_no" placeholder="Enter your account number" name="account_no">
				</div>
				
				<div class="form-group">
					<select name="department" id="" class="form-control">
						<option value="">choose department</option>
						@foreach($departments as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<select name="status" id="" class="form-control">
						<option value="">choose status</option>
						@foreach($status as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>
				
				<div class="form-group">
					<label for="">Gender</label>
					<br/>
				  	<label for="male"><input type="radio" name="gender" value="0" id="male"> Male</label>
				  	&nbsp;
				  	<label for="female"><input type="radio" name="gender" value="1" id="female"> Female</label>
				</div>

				<div class="form-group">
				  	<input type="date" class="form-control" id="dob" placeholder="Enter your DOB" name="dob">
				</div>

				<div class="form-group">
				  	<input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
				</div>

				<div class="form-group">
				  	<input type="text" class="form-control" id="phone_no" placeholder="Enter your phone number" name="phone_no">
				</div>

				<div class="form-group">
				  	<input type="text" class="form-control" id="address" placeholder="Enter your address" name="address">
				</div>

				<div class="form-group">
				  	<input type="date" class="form-control" id="start_date" placeholder="Enter your start date" name="start_date">
				</div>

			  	<button type="submit" class="btn btn-success">Store</button>
			</form>
		</div>
	</div>
@endsection