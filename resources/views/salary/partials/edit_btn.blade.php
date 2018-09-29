
@if(\Auth::user()->is_admin == 1 || \Auth::user()->can("update-dalary"))
    <a href="{{ route('salaries.edit', $model['id']) }}" class="btn btn-success btn-sm">
        <i class="fa fa-edit"></i>
    </a>
@endif