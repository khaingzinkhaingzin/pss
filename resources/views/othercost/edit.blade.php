@extends('layouts.admin_master')

@section('header', "Edit an other cost")

@section('content')
	<div class="container">
		<div class="col-md-11">

			@include('error.form_validate_error')

			<form action="{{ route('othercosts.update', $id) }}" method="post">
				
				{{ csrf_field() }}
				{{ method_field('PATCH') }}

			  <div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" id="name" placeholder="Enter Cost Name" name="name" autofocus>
			  </div>

			  <div class="form-group">
			    <label for="price">Price</label>
			    <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price">
			  </div>

			  <div class="form-group">
			    <label for="start_date">Start Date</label>
			    <input type="date" class="form-control" id="start_date" placeholder="Enter Start Date" name="start_date">
			  </div>

			  <div class="form-group">
			    <label for="expire_date">Expire Date</label>
			    <input type="date" class="form-control" id="expire_date" placeholder="Enter Expire Date" name="expire_date">
			  </div>
			  
			  <button type="submit" class="btn btn-info">Update</button>

			</form>
		</div>
	</div>
@endsection