@extends('layouts.admin_master')

@section('header', "Create a new department")

@section('content')
	<div class="container">
		<div class="col-md-11">
			<h4 class="taxt-center">Department creating form</h4>
			@include("error.form_validate_error")

			<form action="{{ route('departments.store') }}" method="post">
				{{ csrf_field() }}
			  <div class="form-group">
			    <input type="text" class="form-control" id="name" placeholder="Enter Department" name="name" autofocus>
			  </div>
			  
			  <button type="submit" class="btn btn-success btn-sm">Store</button>
			</form>
		</div>
	</div>
@endsection