@extends('layouts.admin_master')

@section('header', "Detail creating form")

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

			<form action="{{ route('phonedetails.store') }}" method="post" enctype="multipart/form-data">
				
				{{ csrf_field() }}

				<div class="form-group">
					<select name="category" class="form-control">
						<option value="">Choose Category</option>
					  	@foreach($categories as $key => $value)
					  		<option value="{{ $key }}">{{ $value }}</option>
					  	@endforeach
					</select>
				</div>
				
				<div class="form-group">
					<select name="phonebrand" id="" class="form-control">
						<option value="" yes>Choose Brand</option>
						@foreach($phonebrands as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>


				<div class="form-group">
				    <label for="file">Choose Image</label>
				    <input type="file" class="form-control-file" id="file" name="file">
				</div>

				<div class="form-group">
				   <select name="model_no" class="form-control">
					   	<option value="">choose model</option>
					  	@foreach($models as $key => $value)
					  		<option value="{{ $key }}">{{ $value }}</option>
					  	@endforeach
					</select>
				</div>

				<div class="form-group">
				   <label for="display">Display</label>
				   <input type="text" class="form-control" id="display" placeholder="Enter Display" name="display" autofocus>
				</div>

				<div class="form-group">
				   <label for="network">Network</label>
				   <input type="text" class="form-control" id="network" placeholder="Enter Network" name="network" autofocus>
				</div>

				<div class="form-group">
				   <label for="connection">Connection</label>
				   <input type="text" class="form-control" id="connection" placeholder="Enter Connection" name="connection" autofocus>
				</div>

				<div class="form-group">
				   <label for="front_camera">Front Camera</label>
				   <input type="text" class="form-control" id="front_camera" placeholder="Enter Front Camera" name="front_camera" autofocus>
				</div>

				<div class="form-group">
				   <label for="back_camera">Back Camera</label>
				   <input type="text" class="form-control" id="back_camera" placeholder="Enter Back Camera" name="back_camera" autofocus>
				</div>
			  
				<div class="form-group">
				   <label for="android_version">Phone Android Version</label>
				   <input type="text" class="form-control" id="android_version" placeholder="Enter Android Version" name="android_version" autofocus>
				</div>

				<div class="form-group">
				   <label for="color">Phone Color</label>
				   <input type="text" class="form-control" id="color" placeholder="Enter Color" name="color" autofocus>
				</div>

				<div class="form-group">
				   <label for="storage">Phone Storage</label>
				   <input type="text" class="form-control" id="storage" placeholder="Enter Storage" name="storage" autofocus>
				</div>

				<div class="form-group">
				   <label for="RAM">RAM</label>
				   <input type="text" class="form-control" id="RAM" placeholder="Enter RAM" name="ram" autofocus>
				</div>

				<div class="form-group">
				   <label for="price">Price</label>
				   <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" autofocus>
				</div>

			  <button type="submit" class="btn btn-success">Store</button>

			</form>

		</div>
	</div>
	
@endsection

<script>
  
  $(document).ready(function() {
    $('select[name="phonebrand"]').on('change', function() {
      var brand = $(this).val();
      if(brand) {
        $.ajax({
          url: '/phonedetails/getmodel/' + brand,
          type: "GET",
          dataType: "json",
          beforeSend: function() {
            $('#loader').css("visibility", "vivible");
          },

          success: function(data) {

            $('select[name="model_no"]').empty();

            $.each(data, function(key, value) {
            	$('select[name="model_no"]').append('<option value="'+key+'">'+value+'</option>');
            });
      	}, 
      	complete: function() {
        	$('#loader').css("visibility", "hidden");
      	}
    });
  }
  else {
    $('select[name="model_no"]').empty();
  }
  });
});

</script>

