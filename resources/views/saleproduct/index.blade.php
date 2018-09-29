@extends("layouts.admin_master")

@section("content")
   <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Service Products</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

            <table class="table table-bordered" id="saleproducts-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Color</th>
                  <th>Quantity</th>
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
    $('#saleproducts-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('saleproducts.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'category', name: 'category' },
            { data: 'brand', name: 'brand' },
            { data: 'model', name: 'model' },
            { data: 'color', name: 'color' },
            { data: 'quantity', name: 'quantity' },
            { data: 'image', name: 'image' },
            { data: 'add-openning-cost', name: 'add-openning-cost' },
        ]
    });
});
</script>
@endpush