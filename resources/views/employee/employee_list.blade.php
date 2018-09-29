@extends("layouts.admin_master")

@section("content")
   <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Employees</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">

          <a href="javascript:history.back()"><i class="btn btn-default fa fa-backward"></i></a>
          <a href="{{ '/salary/store' }}" class="btn btn-success btn-sm">
          <i class="fa fa-calculator"></i> calculate salary for this month</a>

          <hr>

          <table class="table table-bordered" id="employees-table">
            <thead>
              <tr>
                  <th>Id</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Status</th>
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
    $('#employees-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('employees.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'name', name: 'name'},
            { data: 'department', name: 'department' },
            { data: 'status', name: 'status' },
            { data: 'absent', name: 'absent' },
        ]
    });
});
</script>
@endpush