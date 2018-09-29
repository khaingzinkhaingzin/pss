@extends('layouts.admin_master')

@section('title', 'creating category type')

@section('header', "category type editing form")

@section('content')
	<div class="container">
		<div class="col-md-11">

			@include('error.form_validate_error')
			
			<form action="{{ route('categorytypes.update', $id) }}" method="post">

				{{ csrf_field() }}

				{{ method_field('PUT') }}
				
			  	<div class="form-group">
			    	<input type="text" class="form-control" 
                    placeholder="Enter category type"
                    name="name" autofocus>
			  	</div>
			  
			  	<button type="submit" class="btn btn-success pull-right">update</button>
			</form>
		</div>
	</div>
@endsection