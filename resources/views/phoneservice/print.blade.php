@extends('layouts.admin_master')

@section('content')
	<style>
		caption {
			font-size: 25px;
			text-align: center;
			padding-bottom: 20px;
		}
		#tbinvoice {
			box-sizing: border-box;
			/*text-align: center;*/
		}
		#tbinvoice td {
			padding-left: 10%;
			column-width: 400px;
			height: 45px;
			vertical-align: middle;
		}
		/*.okbtn {
			margin-left: 50px;
		}*/
		.button {
			text-align: center;
			padding-top: 30px;
		}
		.okbtn {
			margin-right: 25px;
			width: 100px;
		}
		.cancelbtn {
			margin-left: 25px;
			width: 100px;
		}

	</style>
	<div class="container-fluid">
		<div class="col-md-6 col-md-offset-3">
			<table class="table table-striped bg-info" id="tbinvoice">
				<caption>Customer Vouncher</caption>
				<tr>
					<td>Name</td>
					<td>{{ $phoneservice->name }}</td>
				</tr>
				<tr>
					<td>Brand</td>
					<td>{{ $phoneservice->brand->name }}</td>
				</tr>
				<tr>
					<td>Model Number</td>
					<td>{{ $phoneservice->model->name }}</td>
				</tr>
				<tr>
					<td>Error</td>
					<td>{{ $phoneservice->error }}</td>
				</tr>
				<tr>
					<td>Date</td>
					<td>{{ $phoneservice->date }}</td>
				</tr>
				<!-- <tr>
					<td>Phone Number</td>
					<td>{{ $phoneservice->phone_no }}</td>
				</tr> -->
				<tr>
					<td>Total Cost</td>
					<td>{{ $phoneservice->price }}</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="button">
		<a class="okbtn btn btn-info btn ml-3" onclick="window.print();">OK</a>
		<a href="/phoneservices" class=" cancelbtn btn btn-info">CANCEL</a>
	</div>
	
@endsection


@push('scripts')
<script>
$(function() {
    $('#tbinvoice').DataTable({
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        buttons: [
        {
            extend: 'print',
            text: function ( dt, button, config ) {
                return dt.i18n( 'buttons.print', 'Print' );
            },
        },
    ],

        
    });
});
</script>
@endpush



