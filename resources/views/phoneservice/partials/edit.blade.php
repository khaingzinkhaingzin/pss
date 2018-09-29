<?php 
	$user = \Auth::user();
?>
@if($user->is_admin == 1 || $user->can('update-phoneservice'))
	<a class='btn btn-success btn-sm' href="{{route('phoneservices.edit', $model['id'])}}">
		<i class="fa fa-edit"></i>
	</a>
@endif