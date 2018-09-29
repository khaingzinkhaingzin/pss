@if(\Auth::user()->is_admin == 1 || \Auth::user()->can("update-dalary"))
	<form action="{{ route('salaries.destroy', $model['id']) }}" method="post" 
	onclick="return confirm('Do you want to delete this item?')">
		{{ csrf_field() }}
		{{ method_field("delete") }}
		<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
	</form>
@endif