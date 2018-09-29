@extends('layouts.admin_master')

@section('header', "Create a new other cost")

@section('content')
	<div class="container">
		<div class="col-md-11">

			@include('error.form_validate_error')

			<form action="{{ route('othercosts.store') }}" method="post">
				{{ csrf_field() }}

			  <div class="form-group">
			    <input type="text" class="form-control" id="name" placeholder="Enter Cost Name" name="name" autofocus>
			  </div>

			  <div class="form-group">
			    <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price">
			  </div>

			  <div class="form-group">
					<label for="">Choose start date</label>
			    <input type="date" class="form-control" name="start_date">
			  </div>

				<div class="form-group">
				<label for="">Choose expire date</label>
			    <input type="date" class="form-control" name="expire_date">
			  </div>

			  <button type="submit" class="btn btn-info">Store</button>

			</form>
		</div>
	</div>
@endsection