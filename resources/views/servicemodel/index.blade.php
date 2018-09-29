@extends("layouts.admin_master")

@section("content")
   <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Models</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <a href="{{ url('servicemodels/create') }}" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> create new model</a>

          <hr>

          <table class="table table-bordered" id="servicemodels-table">
            <thead>
              <tr>
                  <th>Brand</th>
                  <th>Model</th>
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
    $('#servicemodels-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('servicemodels.data') !!}',
        columns: [
            { data: 'brand', name: 'brand'},
            { data: 'name', name: 'name' },
            { data: 'edit', name: 'edit' },
            { data: 'delete', name: 'delete' },
        ]
    });
});
</script>
@endpush