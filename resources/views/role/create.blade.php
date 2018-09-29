@extends('layouts.admin_master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('roles.store') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" class="form-control">
					</div>

					<div class="form-group">
						<label for="slug">Slug</label>
						<input type="text" id="slug" name="slug" class="form-control">
					</div>

					<fieldset>
						@foreach($permissions as $permission)
							@foreach($permission as $key => $value)
								<label class="checkbox-inline" for="">
									<input type="checkbox" id="inlineCheckbox1" name="permissions[{{ $key }}]" value="true">{{ $key }}</label>
							@endforeach
						@endforeach
					</fieldset>
					
					<hr>
					<button type="submit" class="btn btn-success">Store</button>
				</form>
			</div>
		</div>
	</div>
@endsection