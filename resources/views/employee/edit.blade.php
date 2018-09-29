@extends('layouts.admin_master')

@section('header', "Edit a new employee")
@section('content')
	<div class="container">
		<div class="col-md-11">

			@include('error.form_validate_error')
			<form action="{{ route('employees.update', $id) }}" method="post" enctype="multipart/form-data">

				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
				  	<label for="name">Name</label>
				  	<input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" autofocus>
				</div>

				<div class="form-group">
				  	<label for="file">Image</label>
				  	<input type="file" class="form-control" id="file" name="file" autofocus>
				</div>

				<div class="form-group">
				  	<label for="nrc">NRC</label>
				  	<input type="text" class="form-control" id="nrc" placeholder="Enter your NRC" name="nrc" autofocus>
				</div>

				<div class="form-group">
				  	<label for="account_no">Account No.</label>
				  	<input type="text" class="form-control" id="account_no" placeholder="Enter your account number" name="account_no" autofocus>
				</div>
				
				<div class="form-group">
					<label for="">Choose Department</label>
					<select name="department" id="" class="form-control">
						@foreach($departments as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="">Choose Status</label>
					<select name="status" id="" class="form-control">
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
				  	<label for="dob">Date of birth</label>
				  	<input type="date" class="form-control" id="dob" placeholder="Enter your DOB" name="dob" autofocus>
				</div>

				<div class="form-group">
				  	<label for="email">Email</label>
				  	<input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" autofocus>
				</div>

				<div class="form-group">
				  	<label for="phone_no">Phone Number</label>
				  	<input type="text" class="form-control" id="phone_no" placeholder="Enter your phone number" name="phone_no" autofocus>
				</div>

				<div class="form-group">
				  	<label for="address">Address</label>
				  	<input type="text" class="form-control" id="address" placeholder="Enter your address" name="address" autofocus>
				</div>

				<div class="form-group">
				  	<label for="start_date">Start Date</label>
				  	<input type="date" class="form-control" id="start_date" placeholder="Enter your start date" name="start_date" autofocus>
				</div>

			  	<button type="submit" class="btn btn-success">Edit</button>
			</form>
		</div>
	</div>
@endsection