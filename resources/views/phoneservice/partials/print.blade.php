<?php 
	$user = \Auth::user();
?>
@if($user->is_admin == 1 || $user->can('update-phoneservice'))
	<a class='btn btn-success btn-sm' id='print' 
		href='{{ "phoneservices/" . $model["id"] . "/print" }}'>
			<i class="fa fa-print"></i>
	</a>
@endif