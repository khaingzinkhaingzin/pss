@extends('layouts.admin_master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			@include('error.form_validate_error')
			
			<form action="{{ route('phonebrands.update', $id) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="brand">Brand Name</label>
					<input type="text" id="brand" name="brand" class="form-control" autofocus="">
				</div>

				<button type="submit" class="btn btn-success btn-sm">Update</button>
			</form>
		</div>
	</div>
</div>
@endsection