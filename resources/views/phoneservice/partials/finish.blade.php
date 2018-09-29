<?php 
	$user = \Auth::user();
?>
@if($user->is_admin == 1 || $user->can('update-phoneservice'))
	<a class='btn btn-success btn-sm' href='{{ "phoneservices/" . $model["id"] . "/finish" }}'>
		<i class="fa fa-check"></i>
	</a>
@endif