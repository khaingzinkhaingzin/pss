@if($errors->any())
	<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		<li style="list-style-type: none;"><i class="fa fa-exclamation-triangle"></i> {{ $error }}</li>
	@endforeach
	</div>
@endif