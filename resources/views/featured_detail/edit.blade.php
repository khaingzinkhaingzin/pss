@extends('layouts.admin_master')

@section('header', "Featured detail editing form")

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

			<form action="{{ route('featuredetails.update', $id) }}" method="post" enctype="multipart/form-data">
				
				{{ csrf_field() }}

        {{ method_field('PUT') }}

				<div class="form-group">
				    <input type="file" class="form-control-file" id="file" name="file">
				</div>

				<div class="form-group">
					<select name="category" class="form-control">
						<option value="">Choose Category</option>
					  	@foreach($categories as $category)
					  		<option value="{{ $category }}">{{ $category }}</option>
					  	@endforeach
					</select>
				</div>
				
				<div class="form-group">
					<select name="phonebrand" id="" class="form-control">
						<option value="">Choose Brand</option>
						@foreach($phonebrands as $phonebrand)
							<option value="{{ $phonebrand }}">{{ $phonebrand }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
				   <select name="model_no" class="form-control">
					   	<option value="">choose model</option>
					  	@foreach($models as $model)
					  		<option value="{{ $model }}">{{ $model }}</option>
					  	@endforeach
					</select>
				</div>

				<div class="form-group">
				   <input type="text" class="form-control" id="color" placeholder="Enter Color" name="color">
				</div>

				<div class="form-group">
				   <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price">
				</div>

			  <button type="submit" class="btn btn-success">Update</button>

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

