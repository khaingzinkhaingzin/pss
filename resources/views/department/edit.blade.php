@extends('layouts.admin_master')

@section('header', "Edit a department")

@section('content')
	<div class="container">
		<div class="col-md-11">
			<h4 class="taxt-center">Department editing form</h4>
			@include("error.form_validate_error")
			<form action="{{ route('departments.update', $id) }}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  	<div class="form-group">
			    	<input type="text" class="form-control" id="name" placeholder="Enter Department" name="name" autofocus>
			  	</div>
			  
			  	<button type="submit" class="btn btn-success btn-sm">Update</button>
			</form>
		</div>
	</div>
@endsection