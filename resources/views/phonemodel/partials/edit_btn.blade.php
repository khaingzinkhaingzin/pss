@if(\Auth::user()->is_admin == 1)
    <a href="{{ route('phonemodels.edit', $model['id']) }}" class="btn btn-success btn-sm">
        <i class="fa fa-edit"></i>
    </a>
@endif