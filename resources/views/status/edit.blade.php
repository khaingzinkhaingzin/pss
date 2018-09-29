@extends('layouts.admin_master')

@section('header', "Edit a status")

@section('content')
	<div class="container">
		<div class="col-md-11">
			@include("error.form_validate_error")

			<form action="{{ route('status.update', $id) }}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  	<div class="form-group">
			    	<label for="name">Status</label>
			    	<input type="text" class="form-control" id="name" placeholder="Enter Status" name="name" autofocus>
			  	</div>
			  
			  	<button type="submit" class="btn btn-info">Edit</button>
			</form>
		</div>
	</div>
@endsection