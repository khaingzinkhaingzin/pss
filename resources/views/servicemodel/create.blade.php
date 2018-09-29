@extends('layouts.admin_master')

@section('header', "Create a new phone model")

@section('content')
	<div class="container">
		<div class="col-md-11">
			<form action="{{ route('servicemodels.store') }}" method="post">
				{{ csrf_field() }}
				
				<div class="form-group">
					<select name="phonebrand" id="" class="form-control">
						@foreach($phonebrands as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>


			  	<div class="form-group">
			    	<input type="text" class="form-control" id="name" placeholder="Enter Phone Model" name="name" autofocus>
			  	</div>
			  
			  	<button type="submit" class="btn btn-success btn-sm">Store</button>
			</form>
		</div>
	</div>
@endsection