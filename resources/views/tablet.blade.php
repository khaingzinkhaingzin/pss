@extends('layouts.master')	

@section('title', 'Tablet')

@section('content')

<style>
	body {
		background: linear-gradient(0deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.2)), url('{{ asset('image/bg1.jpg') }}');
		background-size: cover;
		background-attachment: fixed;
		background-repeat: no-repeat;
	}
</style>

<div class="container-fluid mt-3 mb-5">
	<h2 class="text-center sub-h">Tablet</h2>
	<div class="heading-b text-center pb-3">
		<img src="{{ asset('image/border.png') }}" alt="" style="width: 250px";>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div id="slideParent">
				<div class="card brand-card rounded-0">
					<div class="row m-0 card-header justify-content-between">Brand
						<a class="badge badge-info" data-toggle="collapse" data-target="#brand" data-parent="#slideParent">
							<i class="fa fa-arrow-circle-right fa-2x"></i>
						</a>
					</div>
					<div class="collapse" id="brand">
						<div class="card-body pt-3">
							<ul>
								<li>Apple</li>
								<hr>
								<li>Samsung</li>
								<hr>
								<li>Oppo</li>
								<hr>
								<li>Vivo</li>
								<hr>
								<li>MI</li>
							</ul>


						</div>
					</div>
				</div>

				<div class="card brand-card rounded-0 mt-3">
					<div class="row m-0 card-header justify-content-between">Price
						<a class="badge badge-info" data-toggle="collapse" data-target="#price" data-parent="#slideParent">
							<i class="fa fa-arrow-circle-right fa-2x"></i>
						</a>
					</div>
					<div class="collapse" id="price">
						<div class="card-body pt-3">
							<ul>
								<li>Price by Acending</li>
								<hr>
								<li>Price by Decending</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="card brand-card rounded-0 mt-3">
					<div class="row m-0 card-header justify-content-between">Feature
						<a class="badge badge-info" data-toggle="collapse" data-target="#feature" data-parent="#slideParent">
							<i class="fa fa-arrow-circle-right fa-2x"></i>
						</a>
					</div>
					<div class="collapse" id="feature">
						<div class="card-body pt-3">
							<ul>
								<li>Smart Watch</li>
								<hr>
								<li>Gear Fit</li>
								<hr>
								<li>Wireless Phone</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="card brand-card rounded-0 mt-3">
					<div class="row m-0 card-header justify-content-between">Accessories
						<a class="badge badge-info" data-toggle="collapse" data-target="#accessories" data-parent="#slideParent">
							<i class="fa fa-arrow-circle-right fa-2x"></i>
						</a>
					</div>
					<div class="collapse" id="accessories">
						<div class="card-body pt-3">
							<ul>
								<li>Earphone</li>
								<hr>
								<li>Selfie Stick</li>
								<hr>
								<li>Battery<li>
								<hr>
								<li>Cover</li>
								<hr>
								<li>Case</li>
								<hr>
								<li>Tampered Glass</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="col-md-9">	

			<div class="row">
					<div class="col-md-4">
						<div class="card text-center parent_card">
  							<div class="image_hover">
  								<img class="img-fluid image_design" src="{{ asset('/image/samsung.png') }}">
  								<div class="quick_view">Quick View</div>
  							</div>
  							<div class="content_price">Huawei $118.35</div>	<br>

							<div class="card-block quick_hover">
											
								<span class="fa fa-heart des pull-left" style="font-size: 13px;"> Wishlist</span>
								<span class="fa fa-edit des pull-right" style="font-size: 13px;"> Detail</span>
								<br>
								<a href="#" class="btn btndesign"><i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;Add To Cart</i></a>
						    </div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="card text-center parent_card">
  							<div class="image_hover">
  								<img class="img-fluid image_design" src="{{ asset('/image/samsung.png') }}">
  								<div class="quick_view">Quick View</div>
  							</div>
  							<div class="content_price">Huawei $118.35</div>	<br>
							<div class="card-block quick_hover">
											
								<span class="fa fa-heart des pull-left" style="font-size: 13px;"> Wishlist</span>
								<span class="fa fa-edit des pull-right" style="font-size: 13px;"> Detail</span>
								<br>
								<a href="#" class="btn btndesign"><i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;Add To Cart</i></a>
						    </div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="card text-center parent_card">
  							<div class="image_hover">
  								<img class="img-fluid image_design" src="{{ asset('/image/samsung.png') }}">
  								<div class="quick_view">Quick View</div>
  							</div>
  							<div class="content_price">Huawei $118.35</div>	<br>
							<div class="card-block quick_hover">
											
								<span class="fa fa-heart des pull-left" style="font-size: 13px;"> Wishlist</span>
								<span class="fa fa-edit des pull-right" style="font-size: 13px;"> Detail</span>
								<br>
								<a href="#" class="btn btndesign"><i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;Add To Cart</i></a>
						    </div>
						</div>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-md-4">
						<div class="card text-center parent_card">
  							<div class="image_hover">
  								<img class="img-fluid image_design" src="{{ asset('/image/samsung.png') }}">
  								<div class="quick_view">Quick View</div>
  							</div>
  							<div class="content_price">Huawei $118.35</div>	<br>

							<div class="card-block quick_hover">
											
								<span class="fa fa-heart des pull-left" style="font-size: 13px;"> Wishlist</span>
								<span class="fa fa-edit des pull-right" style="font-size: 13px;"> Detail</span>
								<br>
								<a href="#" class="btn btndesign"><i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;Add To Cart</i></a>
						    </div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="card text-center parent_card">
  							<div class="image_hover">
  								<img class="img-fluid image_design" src="{{ asset('/image/samsung.png') }}">
  								<div class="quick_view">Quick View</div>
  							</div>
  							<div class="content_price">Huawei $118.35</div>	<br>
							<div class="card-block quick_hover">
											
								<span class="fa fa-heart des pull-left" style="font-size: 13px;"> Wishlist</span>
								<span class="fa fa-edit des pull-right" style="font-size: 13px;"> Detail</span>
								<br>
								<a href="#" class="btn btndesign"><i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;Add To Cart</i></a>
						    </div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="card text-center parent_card">
  							<div class="image_hover">
  								<img class="img-fluid image_design" src="{{ asset('/image/samsung.png') }}">
  								<div class="quick_view">Quick View</div>
  							</div>
  							<div class="content_price">Huawei $118.35</div>	<br>
							<div class="card-block quick_hover">
											
								<span class="fa fa-heart des pull-left" style="font-size: 13px;"> Wishlist</span>
								<span class="fa fa-edit des pull-right" style="font-size: 13px;"> Detail</span>
								<br>
								<a href="#" class="btn btndesign"><i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;Add To Cart</i></a>
						    </div>
						</div>
					</div>
				</div>
			</div>				
		</div>
	</div>
</div>

@endsection