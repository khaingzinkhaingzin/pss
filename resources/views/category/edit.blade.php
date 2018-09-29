@extends('layouts.admin_master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-11">

			@include('error.form_validate_error')

			<form action="{{ route('categories.update', $id) }}" method="post">
				<!-- first way -->
					<!-- <input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

				<!-- second way -->
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="category">Category Name</label>
					<input type="text" id="category" name="category" class="form-control" autofocus="">
				</div>

				<button type="submit" class="btn btn-success pull-right">Update</button>
			</form>
		</div>
	</div>
</div>
@endsection