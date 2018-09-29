@extends("layouts.admin_master")

@section("content")
   <div class="box">
   <a href="javascript:history.back()" class="btn btn-default"><i class="fa fa-backward"></i></a>
        <div class="box-header with-border">
          <h3 class="box-title">Donesale List</h3>

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

            <table class="table table-bordered" id="salelists-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Category Type</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Color</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Day<th>
                  <th>Month Year</th>
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
  $('#salelists-table').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,

      order: [ 0, "asc" ],
      ajax: '{!! route('salelists.data') !!}',
      columns: [
          { data: 'name', name: 'name' },
          { data: 'email', name: 'email' },
          { data: 'category_type', name: 'category_type'},
          { data: 'category', name: 'category' },
          { data: 'brand', name: 'brand' },
          { data: 'model', name: 'model' },
          { data: 'color', name: 'color' },
          { data: 'quantity', name: 'quantity' },
          { data: 'price', name: 'price' },
          { data: 'image', name: 'image' },
          { data: 'day', name: 'day' },
          { data: 'month_year', name: 'month_year' },
        ],
    });
});
// console.log('hello');
</script>
@endpush