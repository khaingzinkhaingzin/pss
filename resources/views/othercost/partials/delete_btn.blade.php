@if(\Auth::user()->is_admin == 1)
	<form action="{{ route('othercosts.destroy', $model['id']) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('delete') }}

		<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
	</form>
@endif