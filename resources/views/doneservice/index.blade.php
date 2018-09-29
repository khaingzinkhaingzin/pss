@extends('layouts.admin_master')

@section('header', 'Customers who was serviced')

@section('content')

	   <div class="box">

	        <div class="box-header with-border">

	          <a href="javascript:history.back()" class="btn btn-default"><i class="fa fa-backward"></i></a>
						<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" 
							data-toggle="tooltip" title="Collapse">
	              <i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove" 
							data-toggle="tooltip" title="Remove">
	              <i class="fa fa-times"></i></button>
	          </div>

	        </div>

	        <div class="box-body table-responsive"> 

	            <table class="table table-bordered" id="doneservices">
	              <thead>
	                <tr>
	                  <th>Name</th>
	                  <th>Brand</th>
	                  <th>Model Number</th>
	                  <th>Error</th>
	                  <th>Date</th>
	                  <th>Phone Number</th>
	                  <th>Price</th>
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
	  $('#doneservices').DataTable({
	      responsive: true,
	      processing: true,
	      serverSide: true,
	      ajax: '{!! route('doneservices.data') !!}',
	      columns: [
	          { data: 'name', name: 'name' },
	          { data: 'brand', name: 'brand' },
	          { data: 'model', name: 'model'},
	          { data: 'error', name: 'error' },
	          { data: 'date', name: 'date' },
	          { data: 'phone_no', name: 'phone_no' },
	          { data: 'price', name: 'price' },
	        ],
	        // dom: 'Bfrtip',
	        // buttons: [
	        // {
	        //     extend: 'print',
	        //     text: function ( dt, button, config ) {
	        //         return dt.i18n( 'buttons.print', 'Print' );
	        //     },
	        // }],

	    });
	});
	</script>
	@endpush