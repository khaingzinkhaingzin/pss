@extends('layouts.admin_master')

@section('header', "roleuser creating form")

@section('content')
	<div class="container">
		<div class="col-md-11">
			
            <h4 class="text-center">Attach user and role</h4>
			@include('error.form_validate_error')

			<form action="{{ route('roleusers.store') }}" method="post">

				{{ csrf_field() }}
				
				<div class="form-group">
					<select name="user" id="" class="form-control">
						<option value="">choose user</option>
						@foreach($users as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<select name="role" id="" class="form-control">
						<option value="">choose role</option>
						@foreach($roles as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>
			  
			  	<button type="submit" class="btn btn-success pull-right">
                  Store
                </button>
			  	
			</form>
		</div>
	</div>
@endsection