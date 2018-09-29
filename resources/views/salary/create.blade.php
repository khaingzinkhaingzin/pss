@extends('layouts.admin_master')

@section('header', "Create a new salary")

@section('content')
	<div class="container">
		<div class="col-md-11">
		@include("error.form_validate_error")
			<form action="{{ route('salaries.store') }}" method="post">
				{{ csrf_field() }}
				
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
			    	<input type="number" class="form-control" id="salary" placeholder="Enter Salary" name="salary">
			  	</div>
			  
			  	<button type="submit" class="btn btn-success pull-right">Store</button>
			</form>
		</div>
	</div>
@endsection