@extends('layouts.admin_master')

@section('header', "brand creating form")

@section('content')
	<div class="container">
		<div class="col-md-11">

			@include('error.form_validate_error')

			<form action="{{ route('phonebrands.store') }}" method="post">
				{{ csrf_field() }}
			  <div class="form-group">
			    <label for="brand">Brand Name</label>
			    <input type="text" class="form-control" id="brand" name="brand" autofocus>
			  </div>
			  
			  <button type="submit" class="btn btn-success btn-sm">Store</button>

			</form>
		</div>
	</div>
@endsection