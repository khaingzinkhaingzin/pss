
@extends('layouts.admin_master')

@section('header', "Editing phone service")

<script src="{{ asset('js/jquery.js') }}"></script>
<style>
	#loader {
		visibility: hidden;
	}
</style>

@section('content')
	<div class="container">
		<div class="col-md-11">

			@include('error.form_validate_error')

			<form action="{{ route('phoneservices.update', $id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				
				<div class="form-group">
				   	<label for="name">Customer Name</label>
				   	<input type="text" class="form-control" id="name" placeholder="Enter customer name" name="name" autofocus>
				</div>

				<div class="form-group">
					<select name="brand_id" id="" class="form-control">
						<option value="">Choose Phone Brand</option>
						@foreach($phonebrands as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
				   <select name="model_id" id="" class="form-control">
				   	   <option value="" yes>Choose Phone Model</option>		
				   </select>
				</div>

				<div class="form-group">
					<label for="error">Phone Error</label>
					<textarea name="error" id="error" cols="30" rows="10" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<label for="">Choose Accessory Name</label>
					<select name="accessory_name[]" id="" class="form-control" multiple>
						<option value="nothing">Nothing</option>
						@foreach($accessory_names as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="">Choose Accessory Model Number</label>
					<select name="accessory_model_no[]" id="" class="form-control" multiple>
						<option value="nothing">Nothing</option>
						@foreach($accessory_models as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="">Start Date</label>
					<input type="date" name="start_date" class="form-control">
				</div>

				<div class="form-group">
					<label for="">Expire Date</label>
					<input type="date" name="expire_date" class="form-control">
				</div>
			  
				<div class="form-group">
				   <label for="phone_no">Phone Number</label>
				   <input type="text" class="form-control" id="phone_no" placeholder="Enter phone number" name="phone_no" autofocus>
				</div>

				<div class="form-group">
				   <label for="price">Price</label>
				   <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" autofocus>
				</div>

			  <button type="submit" class="btn btn-info">Submit</button>
			</form>
		</div>
	</div>
@endsection

<script>
  
  $(document).ready(function() {
    $('select[name="brand_id"]').on('change', function() {
      var countryId = $(this).val();
      if(countryId) {
        $.ajax({
          url: '/phoneservices/getmodel/' + countryId,
          type: "GET",
          dataType: "json",

          success: function(data) {
						$('select[name="model_id"]').empty();

						$.each(data, function(key, value) {
							$('select[name="model_id"]').append('<option value="'+key+'">'+value+'</option>');
						});
      		}, 
    		});
  		}
  	});
	});

</script>