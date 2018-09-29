့@extends("layouts.admin_master")

@section('header', 'All Products for Service')

@section("content")
   <div class="box">
        <div class="box-header with-border">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive"> 
            
            <a href="{{ url('costs') }}" class="btn btn-success" style="margin-bottom: 20px;">Back</a>
            
            <table class="table table-bordered" id="salecosts-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Color</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Cost</th>
                  <th>Sale Or Service</th>
                  <th>Date</th>
                </tr>
            </thead>
          </table>  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
         /.box-footer
      </div>
      <!-- /.box -->
@stop


@push('scripts')
<script>
$(function() {
  $('#salecosts-table').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,

      ajax: '{!! route('salecosts.data') !!}',
      columns: [
          { data: 'id', name: 'id' },
          { data: 'category', name: 'category' },
          { data: 'brand', name: 'brand' },
          { data: 'model', name: 'model'},
          { data: 'color', name: 'color' },
          { data: 'quantity', name: 'quantity' },
          { data: 'price', name: 'price' },
          { data: 'cost', name: 'cost' },
          { data: 'sale_or_service', name: 'sale_or_service' },
          { data: 'date', name: 'date' },
        ],

    });
});
</script>
@endpush