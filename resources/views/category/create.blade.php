@extends('layouts.admin_master')

@section('title', 'creating category')

@section('header', "category creating form")

@section('content')
	<div class="container">
		<div class="col-md-11">

			@include('error.form_validate_error')
			
			<form action="{{ route('categories.store') }}" method="post">

				{{ csrf_field() }}
				
			  	<div class="form-group">
			    	<input type="text" class="form-control" id="category" name="category" 
					placeholder="Enter category name" autofocus>
			  	</div>
			  
			  	<button type="submit" class="btn btn-success pull-right">store</button>
			</form>
		</div>
	</div>
@endsection