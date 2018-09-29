@extends('layouts.master')

@section('title', 'Detail Page')

@section('content')

	<style>
		.main-image {
			width: 500px;
			height: 500px;
			border: 1px solid black;
			box-shadow: 0px 0px 15px gray;
		}

		body {
			background-image: url('{{ asset('image/bgr6.jpg') }}');
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
		}

		.card, .card-header {
			background-color: rgba(255, 255, 255, 0.1);
		}

		.color>div {
			width: 150px;
			height: 160px;
			border: 1px solid black;
			box-shadow: 0px 0px 15px gray;
		}
	</style>

	<div class="container pt-5 pb-5">
		<div class="row">

			<div class="col-md-6">
				<div class="main-image">
					<img src="{{ asset('/storage/images/' . $detail->image) }}" alt="" 
					class="img-fluid">
				</div>
				<br>
				<hr>
				<div class="row color">
					@foreach($colors as $color)
						<div class="col-md-4">
							<a href="{{ url('/detail/'.$color->id) }}"><img src="{{ asset('/storage/images/' . $color->image) }}" alt="" class="img-fluid"></a>
						</div>
					@endforeach
				</div>
			</div>

			<div class="col-md-6">
				<div class="container row justify-content-between">
					<div>
						<a href="">+ ADD TO COMPARE</a>
						&nbsp;
						<a href="">+ ADD TO WISHLIST</a>
					</div>

					<div>
						<a href="" class="fa fa-facebook"> Like</a>
						&nbsp;
						<a href="" class="fa fa-twitter"> Twitter</a>
					</div>
				</div>
				<hr>

				<div class="container row justify-content-between">
					<span>price {{ $detail->price }}</span>
					<a href="{{ route('cart.edit', $detail->id) }}" class="btn btn-success">Add To Cart</a>
				</div>

				
				<div id="toggle-parent">
					
					<!-- <div class="btn-group"> -->
						<div class="card border-0 mt-2">
							<div class="card-header border-0 mb-2">
								<button class="btn btn-success detail-btn" 
								data-toggle="collapse" data-target="#detail" 
								data-parent="#toggle-parent">Detail</button>

								<button class="btn btn-success" data-toggle="collapse" 
								data-target="#advantages" data-parent="#toggle-parent">Advantages</button>
							</div>
							<div class="collapse show" id="detail">
								<div class="card-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Name</th>
												<th>Value</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>
													Brand
												</td>
												<td>
													{{ $detail->brand }}
												</td>
											</tr>
											<tr>
												<td>
													Model Number
												</td>
												<td>
													{{ $detail->model }}
												</td>
											</tr>
											<tr>
												<td>
													Color
												</td>
												<td>
													{{ $detail->color }}
												</td>
											</tr>
											<tr>
												<td>
													Price
												</td>
												<td>
													{{ $detail->price }}
												</td>
											</tr>
											@if($category_type == 'Smartphone' || $category_type == 'Tablet')
												<tr>
												<td>
													Android Version
												</td>
												<td>
													{{ $detail->android_version }}
												</td>
											</tr>
											<tr>
												<td>
													Internal Storage
												</td>
												<td>
													{{ $detail->storage }}
												</td>
											</tr>
											<tr>
												<td>
													RAM
												</td>
												<td>
													{{ $detail->RAM }}
												</td>
											</tr>
											<tr>
												<td>
													Screen Size
												</td>
												<td>
													{{ $detail->display }}
												</td>
											</tr>
											<tr>
												<td>
													Standard Network
												</td>
												<td>
													{{ $detail->network }}
												</td>
											</tr>
											<tr>
												<td>
													Standard Internet
												</td>
												<td>
													{{ $detail->connection }}
												</td>
											</tr>
											@endif
										</tbody>
									</table>	
								</div>
							</div>
						</div>

						<div class="card border-0">

							<div class="collapse" id="advantages">
								<div class="card-body">

									<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet commodi est vitae debitis quis atque sunt. Nemo aliquam hic, enim incidunt doloremque illo natus cupiditate saepe perferendis, nam fugiat!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi obcaecati ab est vero voluptatibus illum labore dolorem esse, in itaque dolores quisquam, deleniti odio ad possimus eaque minima perspiciatis et.</p>
									
								</div>
							</div>

						</div>

					</div>


				</div>

				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center pb-3 pt-5">Related Products</h3>

						<div class="carousel slide" data-ride="carousel" data-interval="2000" id="mycarousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<div class="row">
										@foreach($real_related_products as $real_related_product)
											<div class="col-md-3">
												<img src="{{ asset('/storage/images/' . $real_related_product['image']) }}" alt="" class="img-fluid">
												<div class="row justify-content-center pt-3">
													<span>{{ $real_related_product['brand'] }}</span>/<span>{{ $real_related_product['model'] }}</span>
												</div>
											</div>
										@endforeach	
									</div>
								</div>
							</div>

							<a href="#mycarousel" class="carousel-control-prev" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>

							<a href="#mycarousel" class="carousel-control-next" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>
				</div>
				
			</div>

		</div>
	</div>

@endsection