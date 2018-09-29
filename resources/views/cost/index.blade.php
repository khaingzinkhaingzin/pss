ုုုု<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>

<!-- @import("swal from 'sweetalert'") -->
@extends("layouts.admin_master")

@section('header', 'All Products for Sale and Service')

<style>
  div.showAnswer {
    font-size: 20px;
    padding-right: 50px;
    background-color: rgb(66, 69, 98);
    text-align: center;
    width: 100%;
    color: white;
    margin-bottom: 20px;
  }
  div>span {
    padding: 5px;
  }
</style>

@section("content")
   <div class="box">
        <div class="box-header with-border">
              <a href="javascript:history.back()" class="btn btn-default"><i class="fa fa-backward"></i></a>
              <select name="" id="service-filter">
                <option value="">service profit by each month</option>
                @foreach($month_years as $month_year)
                  <option value="{{ $month_year }}">{{ $month_year }}</option>
                @endforeach
              </select>

              <select name="" id="sale-filter">
                <option value="">sale profit by each month</option>
                @foreach($month_years as $month_year)
                  <option value="{{ $month_year }}">{{ $month_year }}</option>
                @endforeach
              </select>

              <select name="" id="total-filter">
                <option value="">total profit by each month</option>
                @foreach($month_years as $month_year)
                  <option value="{{ $month_year }}">{{ $month_year }}</option>
                @endforeach
              </select>
              @if(\Auth::check())
                @if(\Auth::user()->is_admin == 1)
                  <a class="btn btn-success btn-sm" href="{{ url('costs/create') }}">create new product</a>
                @endif
              @endif

          </div>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="showAnswer"></div>
        <div class="box-body table-responsive">     
            <table class="table table-bordered" id="costs-table">
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
                  <th>Day</th>
                  <th>Month Year</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
            </thead>
          </table>  
        </div>
        <!-- /.box-body -->
        <div class="box-footer" id="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
@stop


@push('scripts')
<script>
var table;
$(function() {
  table = $('#costs-table').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      // dom: "lrtip",

      ajax: '{!! route('costs.data') !!}',
      columns: [
          { data: 'id', name: 'id' },
          { data: 'category', name: 'category' },
          { data: 'brand', name: 'brand' },
          { data: 'model', name: 'model'},
          { data: 'color', name: 'color' },
          { data: 'quantity', name: 'quantity' },
          { data: 'price', name: 'price' },
          { data: 'cost', name: 'cost' },
          { data: 'sale_service', name: 'sale_service' },
          { data: 'day', name: 'day' },
          { data: 'month_year', name: 'month_year' },
          { data: 'image', name: 'image' },
          { data: 'edit', name: 'edit' },
          { data: 'delete', name: 'delete' },
        ],
    });
});


$("#service-filter").on("change", function() {
  table.search(this.value).draw();
});

$("#sale-filter").on("change", function() {
  table.search(this.value).draw();
});

$("#total-filter").on("change", function() {
  table.search(this.value).draw();
});

</script>

<script>
  
  $(document).ready(function() {
    $("#service-filter").on('change', function() {
      var my = $(this).val();
      if(my) {
        $.ajax({
          url: '/serviceprofit-for/' + my,
          type: "GET",
          dataType: "json",
          success: function(result) {
            console.log(result);
            var total_cost = result.total_cost;
            var income = result.income;
            var profit = result.profit;
            // console.log(income, total_cost, profit);
            // $("#costs-table").append("<tfoot><tr><td>Cost : " + total_cost + "</td><td>Income : " + income + "</td><td>Profit : " + profit + "</td></tr></tfoot>");

            $(".showAnswer").html("<span>Cost for service : " + total_cost + "</span><span>Income for service : " + income + "</span><span>Profit for service : " + profit + "</span>");
          },       
        });
      }
    });
  });

</script>

<script>
  
  $(document).ready(function() {
    $("#sale-filter").on('change', function() {
      var my = $(this).val();
      if(my) {
        $.ajax({
          url: '/saleprofit-for/' + my,
          type: "GET",
          dataType: "json",
          success: function(result) {
            console.log(result);
            var total_cost = result.total_cost;
            var income = result.income;
            var profit = result.profit;
            // console.log(income, total_cost, profit);
            // $("#costs-table").append("<tfoot><tr><td>Cost : " + total_cost + "</td><td>Income : " + income + "</td><td>Profit : " + profit + "</td></tr></tfoot>");

            $(".showAnswer").html("<span>Cost for sale : " + total_cost + 
            "</span><span>Income for sale : " + income + "</span><span>Profit for sale : " + profit + "</span>");
          },       
        });
      }
    });
  });

</script>

<script>
  
  $(document).ready(function() {
    $("#total-filter").on('change', function() {
      var my = $(this).val();
      if(my) {
        $.ajax({
          url: '/totalprofit-for/' + my,
          type: "GET",
          dataType: "json",
          success: function(result) {
            console.log(result);
            var total_cost = result.total_cost;
            var other_cost = result.other_cost;
            var salary_cost = result.salary_cost;
            var income = result.income;
            var profit = result.profit;
            // console.log(income, total_cost, other_cost, profit);
            // $("#costs-table").append("<tfoot><tr><td>Cost : " + total_cost + "</td><td>Income : " + income + "</td><td>Profit : " + profit + "</td></tr></tfoot>");

            $(".showAnswer").html("<span>Total cost : " + total_cost + "</span><span>Other cost : " + other_cost + 
            "</span><span>Salary cost : " + salary_cost + "</span><span>Total income : " + income + "</span><span>Total profit : " + profit + "</span>");
            if(profit < 0) {
              swal("Loss This Month !");
              // alert("Loss This Month !");
            }
            else {
              alert("Profit This Month !");
            }
          },       
        });
      }
    });
  });

</script>
@endpush