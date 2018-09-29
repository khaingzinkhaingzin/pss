@extends('layouts.admin_master')

@section('header', "model editing form")

@section('content')
	<div class="container">
		<div class="col-md-11">
			@if($errors->any())
				<div class="alert alert-danger">
				@foreach($errors->all() as $error)
					<li style="list-style-type: none;"><i class="fa fa-exclamation-triangle"></i> {{ $error }}</li>
				@endforeach
				</div>
			@endif
			
			<form action="{{ route('phonemodels.update', $id) }}" method="post">
				
				{{ csrf_field() }}

				{{ method_field('PUT') }}
				 
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
			    	<input type="text" class="form-control" id="name" name="name" placeholder="enter model" value="{{ $model }}">
			  	</div>
			  
			  	<button type="submit" class="btn btn-success">Update</button>
			</form>
		</div>
	</div>
@endsection