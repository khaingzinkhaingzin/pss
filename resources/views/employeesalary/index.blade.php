@extends("layouts.admin_master")

<style>
.myrow {
  height: 40px;
}
</style>
@section("content")
   <div class="box">
   <h3 class="box-title">All Employee Salaries</h3>
        <div class="box-header with-border">
        <a href="javascript:history.back()" class="btn btn-default"><i class="fa fa-backward"></i></a>
          <select name="" id="table-filter">
              <option value="">select month and year</option>
              @foreach($month_years as $month_year)
                <option value="{{ $month_year }}">{{ $month_year }}</option>
              @endforeach
          </select>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-bordered" id="employeesalaries-table">
            <thead>
              <tr>
                  <th>Employee Code</th>
                  <th>Employee Name</th>
                  <th>Department</th>
                  <th>Status</th>
                  <th>Salary</th>
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
  var id = 0;
$(function() {
    $('#employeesalaries-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('employeesalaries.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name'},
            { data: 'department', name: 'department'},
            { data: 'status', name: 'status'},
            { data: 'salary', name: 'salary' },
            { data: 'month_year', name: 'month_year' },
        ]
    });
});
</script>

<script>
  
  $(document).ready(function() {
    $("#table-filter").on('change', function() {
      var my = $(this).val();
      if(my) {
        $.ajax({
          url: '/employeesalaries-for/' + my,
          type: "GET",
          dataType: "json",
          success: function(data) {
            $('#employeesalaries-table').empty();

            $('#employeesalaries-table').append('<tr class="myrow"><th>Employee Code</th><th>Employee Name</th><th>Department</th><th>Status</th><th>Salary</th><th>month_year</th></tr>');

            $.each(data, function(key, value) {
              $('#employeesalaries-table').append('<tr class="myrow"><td>'+value['emp_id']+'</td><td>'+value['emp_name']+'</td><td>'+value['department']+'</td><td>'+value['statu']+'</td><td>'+value['salary']+'</td><td>'+value['month_year']+'</td></tr>');
            });

            // console.log(result);

            // $("#box-footer").html("<span class='box-footer-content'>Cost : " + total_cost + "</span><span class='box-footer-content'>Income : " + income + "</span><span class='box-footer-content'>Profit : " + profit + "</span>");
          },       
        });
      }
    });
  });

</script>
@endpush