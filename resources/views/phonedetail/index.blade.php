@extends("layouts.admin_master")

@section("content")
   <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Phone Details</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">

          @if(\Auth::user()->is_admin == 1)
            <a href="{{ route('phonedetails.create') }}" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> create Phone Detail</a>
          @endif

          <hr>

          <table class="table table-bordered" id="phonedetails-table">
            <thead>
              <tr>
                  <th>Id</th>
                  <th>Image</th>
                  <th>Brand</th>
                  <th>Category</th>
                  <th>Model Number</th>
                  <th>Display</th>
                  <th>Network</th>
                  <th>Connection</th>
                  <th>Front Camera</th>
                  <th>Back Camera</th>
                  <th>Android Version</th>
                  <th>Color</th>
                  <th>Storage</th>
                  <th>RAM</th>
                  <th>Price</th>
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
    $('#phonedetails-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('phonedetails.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'brand', name: 'brand'},
            { data: 'category', name: 'category' },
            { data: 'model', name: 'model' },
            { data: 'display', name: 'display' },
            { data: 'network', name: 'network' },
            { data: 'connection', name: 'connection' },
            { data: 'front_camera', name: 'front_camera' },
            { data: 'back_camera', name: 'back_camera' },
            { data: 'android_version', name: 'android_version' },
            { data: 'color', name: 'color' },
            { data: 'storage', name: 'storage' },
            { data: 'RAM', name: 'RAM' },
            { data: 'price', name: 'price' },
            { data: 'edit', name: 'edit' },
            { data: 'delete', name: 'delete' },
        ]
    });
});
</script>
@endpush