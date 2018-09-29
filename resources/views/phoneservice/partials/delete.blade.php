<?php 
	$user = \Auth::user();
?>
@if($user->is_admin == 1)
	<form action="{{route('phoneservices.destroy', $model['id'])}}" method="post"
		style="margin-top: 3px">
			{{csrf_field()}}

			{{method_field("delete")}} 
			<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
	</form>
@endif