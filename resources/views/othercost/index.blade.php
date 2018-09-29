@extends("layouts.admin_master")

@section("content")
   <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Phone Brands</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

            <a href="{{ url('othercosts/create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> create other cost</a>

            <hr>

            <table class="table table-bordered" id="othercosts-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Start Day</th>
                  <th>Start M&Y</th>
                  <th>End Day</th>
                  <th>End M&Y</th>
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
    $('#othercosts-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('othercosts.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'start_day', name: 'start_day' },
            { data: 'start_month_year', name: 'start_month_year' },
            { data: 'expire_day', name: 'expire_day' },
            { data: 'expire_month_year', name: 'expire_month_year' },
            { data: 'edit', name: 'edit' },
            { data: 'delete', name: 'delete' },
        ]
    });
});
</script>
@endpush