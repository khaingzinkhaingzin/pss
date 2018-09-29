@extends('layouts.admin_master')

@section('header', "Edit a salary")

@section('content')
	<div class="container">
		<div class="col-md-11">
			@include("error.form_validate_error")
			<form action="{{ route('salaries.update', $id) }}" method="post">

				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
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
			    	<input type="number" class="form-control" id="salary" placeholder="Enter Salary" name="salary" autofocus>
			  	</div>
			  
			  	<button type="submit" class="btn btn-success">Edit</button>
			</form>
		</div>
	</div>
@endsection