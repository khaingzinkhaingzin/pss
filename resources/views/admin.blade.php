@extends('layouts.admin_master')

@section('header', 'Admin Dashbord')

<style>
   	.admin a {
   		color: white;;
   	}
   	.admin a:hover {
   		color: yellow;
   	}
	.admin>div {
		margin: 20px 20px;
		height: 15%;
		color: white;
		font-size: 23px;
		text-align: center;
		padding-top: 1%;
	}
	.employee-list {
		background-color: rgb(255, 126, 19);
	}
	.employee-info {
		background-color: rgb(44, 225, 142);
	}
	.sale-cost-list {
		background-color: rgb(0, 161, 218);
	}
	.list-for-year {
		background-color: rgb(255, 88, 99);
	}
	.sale-profit {
		background-color: rgb(69, 191, 224);
	}
	.service-profit {
		background-color: rgb(255, 202, 0);
	}
	.total-cost {
		background-color: rgb(122, 105, 192);
	}
	.repair-list {
		background-color: rgb(5, 248, 12);
	}
	.done-sale-list {
		background-color: rgb(80, 225, 142);
	}


	.employee-list:hover {
		background-color: rgba(0, 0, 0, 0.5);
	}
	.employee-info:hover {
		background-color: rgba(0, 0, 0, 0.5);
	}
	.sale-cost-list:hover {
		background-color: rgba(0, 0, 0, 0.5);
	}	
	.list-for-year:hover {
		background-color: rgba(0, 0, 0, 0.5);
	}
	.sale-profit:hover {
		background-color: rgba(0, 0, 0, 0.5);
	}
	.service-profit:hover {
		background-color: rgba(0, 0, 0, 0.5);
	}
	.total-cost:hover {
		background-color: rgba(0, 0, 0, 0.5);
	}
	.repair-list:hover {
		background-color: rgba(0, 0, 0, 0.5);
	}
	.done-sale-list:hover {
		background-color: rgba(0, 0, 0, 0.5);
	}
	
</style>

@section('content')

	<div class="container">
		<div class="row admin">
			<div class="col-md-3 service-profit">
				<a href="{{ '/users' }}">
					User Lists <br><i class="fa fa-user fa-2x"></i>		
				</a>
			</div>
			<div class="col-md-3 employee-info">
				<a href="/employees">
					All Employee Info <br><i class="fa fa-id-card fa-2x"></i>
				</a>
			</div>
			<div class="col-md-3 employee-list">
				<a href="/employee_list">
					Employee Rollcall <br><i class="fa fa-list fa-2x"></i>
				</a>
			</div>
			<div class="col-md-3 sale-profit">
				<a href="/employeesalaries">
					Employee Salaries <br><i class="fa fa-credit-card fa-2x"></i>
				</a>
			</div>
			<div class="col-md-3 sale-cost-list">
				<a href="/costs">
					List For Each Month <br><i class="fa fa-pie-chart fa-2x"></i>
				</a>
			</div>
			<!-- pie-chart -->
			<div class="col-md-3 list-for-year">
				<a href="/list-by-year">
					List For Each Year <br><i class="fa fa-area-chart fa-2x"></i>
				</a>
			</div>
			<div class="col-md-3 repair-list">
				<a href="{{ url('/phoneservices') }}">
					Repair Customer List <br><i class="fa fa-list fa-2x"></i>
				</a>
			</div>
			<div class="col-md-3 total-cost">
				<a href="{{ url('/doneservices') }}">
					Done Service <br><i class="fa fa-check fa-2x"></i>
				</a>
			</div>
			<div class="col-md-3 done-sale-list">
				<a href="{{ url('/salelists') }}">
					Done Sale List <br><i class="fa fa-check fa-2x"></i>
				</a>
			</div>
		</div>
	</div>

@endsection