@extends('layouts.admin_master')

@section('header', "model creating form")

@section('content')
	<div class="container">
		<div class="col-md-11">
			
			@include('error.form_validate_error')

			<form action="{{ route('phonemodels.store') }}" method="post">

				{{ csrf_field() }}
				
				<div class="form-group">
					<select name="category" id="" class="form-control">
						<option value="">choose category</option>
						@foreach($categories as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<select name="brand" id="" class="form-control">
						<option value="">choose brand</option>
						@foreach($brands as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>


			  	<div class="form-group">
			    	<input type="text" class="form-control" id="name" placeholder="Enter Model" name="name">
			  	</div>
			  
			  	<button type="submit" class="btn btn-success btn-sm">Store</button>
			  	
			</form>
		</div>
	</div>
@endsection