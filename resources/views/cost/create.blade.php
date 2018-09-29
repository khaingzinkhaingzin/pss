@extends('layouts.admin_master')

@section('header', "cost creating form")

<script src="{{ asset('js/jquery.js') }}"></script>

@section('content')

	<div class="container">
		<div class="col-md-11">

			@include('error.form_validate_error')

			<form action="{{ route('costs.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<div class="form-group">
				   <select name="category_type" id="" class="form-control">
				   		<option value="">choose category type</option>
				   		@foreach($categorytypes as $categorytype)
				   			<option value="{{ $categorytype }}">{{ $categorytype }}</option>
				   		@endforeach
				   </select>
				</div>

				<div class="form-group">
				   <select name="category" id="" class="form-control">
				   		<option value="">choose category</option>
				   		@foreach($categories as $category)
				   			<option value="{{ $category }}">{{ $category }}</option>
				   		@endforeach
				   </select>
				</div>

				<div class="form-group">
				   <select name="brand" id="" class="form-control">
				   		<option value="">choose brand</option>
				   		@foreach($brands as $brand)
				   			<option value="{{ $brand }}">{{ $brand }}</option>
				   		@endforeach
				   </select>
				</div>
				
				<div class="form-group">	
					<select name="model" id="" class="form-control">
						<option value="">choose model</option>
				  </select>
				</div>

				<div class="form-group">
				   <input type="text" class="form-control" id="color" placeholder="Enter Color" name="color">
				</div>

				<div class="form-group">
				   <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity">
				</div>

				<div class="form-group">
				   <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price">
				</div>

				<div class="form-group">
				   <select name="sale_or_service" class="form-control">
					  	
					  	<option value="0">Sale</option>
					  	<option value="1">Service</option>
					  	
					</select>
				</div>

				<div class="form-group">
				    <input type="date" class="form-control" id="date" name="date">
				</div>

				<div class="form-group">
					<input type="file" class="form-group" name="file">
				</div>

			  <button type="submit" class="btn btn-success pull-right">store</button>

			</form>

		</div>
	</div>
	
@endsection


<script>
  
  $(document).ready(function() {
    $('select[name="brand"]').on('change', function() {
      var brand = $(this).val();
      if(brand) {
        $.ajax({
          url: '/costs/getmodel/' + brand,
          type: "GET",
          dataType: "json",
          beforeSend: function() {
            $('#loader').css("visibility", "vivible");
          },

          success: function(data) {

            $('select[name="model"]').empty();

            $.each(data, function(key, value) {
            	$('select[name="model"]').append('<option value="'+value+'">'+value+'</option>');
            });
      	}, 
      	complete: function() {
        	$('#loader').css("visibility", "hidden");
      	}
    });
  }
  else {
    $('select[name="model"]').empty();
  }
  });
});

</script>