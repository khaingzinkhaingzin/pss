@extends("layouts.admin_master")

@section("content")
  <div class="container-fluid m-0">
      <div class="col-md-12">

        @include('error.form_validate_error')

        <form action="{{ route('phonebrands.store') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="brand">Brand Name</label>
            <input type="text" class="form-control" id="brand" name="brand" autofocus>
          </div>
          
          <button type="submit" class="btn btn-success btn-sm">Store</button>

        </form>
      </div>
    </div>
   <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Brands</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

            <!-- <a href="{{ url('phonebrands/create') }}" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> create a new brand</a>

            <hr> -->

            <table class="table table-bordered" id="phonebrands-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
            </table>  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
@stop
@push('scripts')
<script>
$(function() {
    $('#phonebrands-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('phonebrands.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'edit', name: 'edit' },
            { data: 'delete', name: 'delete' },
        ]
    });
});
</script>
@endpush