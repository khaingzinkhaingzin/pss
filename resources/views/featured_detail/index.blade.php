@extends("layouts.admin_master")

@section("content")
   <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Featured Details</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">

          @if(\Auth::user()->is_admin == 1)
            <a href="{{ route('featuredetails.create') }}" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> create feature detail</a>
          @endif

          <hr>

          <table class="table table-bordered" id="featuredetails-table">
            <thead>
              <tr>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Model Number</th>
                  <th>Color</th>
                  <th>Image</th>
                  <th>Price</th>
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
    $('#featuredetails-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('featuredetails.data') !!}',
        columns: [
            { data: 'category', name: 'category' },
            { data: 'brand', name: 'brand'},
            { data: 'model', name: 'model' },
            { data: 'color', name: 'color' },
            { data: 'image', name: 'image' },            
            { data: 'price', name: 'price' },
            { data: 'edit', name: 'edit' },
            { data: 'delete', name: 'delete' },
        ]
    });
});
</script>
@endpush