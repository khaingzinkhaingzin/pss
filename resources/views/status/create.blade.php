@extends('layouts.admin_master')

@section('header', 'Create a new status')

@section('content')
	<div class="container">
		<div class="col-md-11">

			@include("error.form_validate_error")

			<form action="{{ route('status.store') }}" method="post">
				{{ csrf_field() }}
			  <div class="form-group">
			    <input type="text" class="form-control" id="name" placeholder="Enter Status" name="name" autofocus>
			  </div>
			  
			  <button type="submit" class="btn btn-success">Store</button>
			</form>
		</div>
	</div>
@endsection