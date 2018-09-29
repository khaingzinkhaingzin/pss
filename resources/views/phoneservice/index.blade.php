@extends("layouts.admin_master")

@section("content")
   <div class="box">
   <a href="javascript:history.back()" class="btn btn-default"><i class="fa fa-backward"></i></a>
        <div class="box-header with-border">
          <h3 class="box-title">Customer List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive"> 
        
            <a href="{{ url('phoneservices/create') }}" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> create a new customer</a>

            <table class="table table-bordered" id="phoneservices-table">
              <thead>
                <tr>
                  <th>R-Day</th>
                  <th>User Name</th>
                  <th>Brand</th>
                  <th>Ph Model</th>
                  <th>Error</th>
                  <th>Name</th>
                  <th>Model</th>
                  <th>Date</th>
                  <th>Exp-Date</th>
                  <th>Phone Number</th>
                  <th>Price</th>
                  <th><th>
                  <th></th>
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
  $('#phoneservices-table').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,

      order: [ 0, "asc" ],
      ajax: '{!! route('phoneservices.data') !!}',
      columns: [
          { data: 'remaining_day', name: 'remaining_day' },
          { data: 'name', name: 'name' },
          { data: 'brand', name: 'brand' },
          { data: 'model', name: 'model'},
          { data: 'error', name: 'error' },
          { data: 'accessory', name: 'accessory' },
          { data: 'accessory_model', name: 'accessory_model' },
          { data: 'date', name: 'date' },
          { data: 'expire_date', name: 'expire_date' },
          { data: 'phone_no', name: 'phone_no' },
          { data: 'price', name: 'price' },
          { data: 'edit', name: 'edit' },
          { data: 'finish', name: 'finish' },
          { data: 'print', name: 'print' },
          { data: 'delete', name: 'delete' },
        ],
        dom: 'Bfrtip',
        buttons: [
        {
            extend: 'print',
            text: function ( dt, button, config ) {
                return dt.i18n( 'buttons.print', 'Print' );
            },
        }],

    });
});
// console.log('hello');
</script>
@endpush