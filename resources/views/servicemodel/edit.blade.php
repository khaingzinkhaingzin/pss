@extends('layouts.admin_master')

@section('header', "Edit a service model")

@section('content')
	<div class="container">
		<div class="col-md-11">
			<form action="{{ route('servicemodels.update', $id) }}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				 
				<div class="form-group">
					<select name="phonebrand" id="">
						@foreach($phonebrands as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>


			  	<div class="form-group">
			    	<label for="name">Phone Model</label>
			    	<input type="text" class="form-control" id="name" placeholder="Enter Phone Model" name="name" autofocus>
			  	</div>
			  
			  	<button type="submit" class="btn btn-info">Update</button>
			</form>
		</div>
	</div>
@endsection