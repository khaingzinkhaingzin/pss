@extends('layouts.master')

@section('title', 'Home Page')

@section('content')

<style>

.carouselslide {
	height: 500px;
}

.carouselslide:nth-child(1) {
	background: url("{{ asset('image/bgimage_1.jpg') }}");
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
}

.carouselslide:nth-child(2) {
	background: url("{{ asset('image/bgimage_2.jpg') }}");
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
}

.carouselslide:nth-child(3) {
	background: url("{{ asset('image/bgimage_3.jpg') }}");
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
}

.carousel-fade .carousel-inner .carousel-item {
	opacity: 0.8;
	transition-property: opacity;
	/*transition-duration: 5s;*/
	transition-delay: 0s;
}

.carousel-fade .carousel-inner .active {
	opacity: 1;
}


.carousel-text {
	margin-top: 60px;
	color: white;
}

.text {
	margin-top: 80px;
}

.slide-htext {
	font-size: 45px;
	font-family: 'nunito';
}

.slide-ptext {
	font-size: 20px;
	padding-left: 5px;
	font-family: 'nunito-ex';
}

.shopnow-btn {
	border-radius: 20px;
}


	.homebody {
		padding: 0;
		padding-top: 100px;
		background: linear-gradient(0deg, rgba(255, 255, 255, 0.1),
		  rgba(255, 255, 255, 0.1)), url('{{ asset('image/bg1.jpg') }}');
		background-size: cover;
		background-attachment: fixed;
	}

	.category-con {
		background-color: rgba(0, 0, 0, 0.1);
		color: white;
	}

	.discount {
		background-color: rgba(0, 0, 0, 0.1);
	}

	.feature {
		background-color: rgba(0, 0, 0, 0.1);
	}

	.latest-card {
		background-color: rgba(255, 255, 255, 0.5);
	}

	.popular-card {
		background-color: rgba(255, 255, 255, 0.5);
	}

	.feature-card {
		background-color: rgba(255, 255, 255, 0.5);
	}

</style>

<!-- START CAROUSEL -->

<div class="carousel slide carousel-fade" data-ride="carousel" id="carouselFade" data-interval="3000">
  <div class="carousel-inner">
    <div class="carousel-item active carouselslide">
      <div class="row carousel-text">
        <div class="col-md-6 text-center">
          <img src="{{ asset('image/image_1.jpg') }}" alt="" class="wow slideInLeft" data-wow-iteration="1" data-wow-duration="0.9s">
        </div>
        <div class="text col-md-6 wow slideInRight">
          <h6 class="wow slideInRight slide-htext" data-wow-iteration="1" data-wow-duration="0.3s">Smart Phone's Trend</h6>
          <p class="wow slideInRight slide-ptext" data-wow-iteration="1" data-wow-duration="0.8s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          <button class="wow slideInRight btn btn-outline-secondary shopnow-btn" data-wow-iteration="1" data-wow-duration="1.2s">Shop Now</button>
        </div>
      </div>
    </div>
    <div class="carousel-item carouselslide">
      <div class="row carousel-text">
        <div class="col-md-6 text-center">
          <img src="{{ asset('image/image_2.jpg') }}" alt="" class="wow slideInLeft" data-wow-iteration="1" data-wow-duration="0.9s">
        </div>
        <div class="text col-md-6 wow slideInRight">
          <h6 class="wow slideInRight slide-htext" data-wow-iteration="1" data-wow-duration="0.3s">Mobile Phone's Trend</h6>
          <p class="wow slideInRight slide-ptext" data-wow-iteration="1" data-wow-duration="0.8s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          <button class="wow slideInRight btn btn-outline-secondary shopnow-btn" data-wow-iteration="1.5s" data-wow-duration="1.2s">Shop Now</button>
        </div>
      </div>
    </div>
    <div class="carousel-item carouselslide">
      <div class="row carousel-text">
        <div class="col-md-6 text-center" >
          <img src="{{ asset('image/image_3.jpg') }}" alt="" class="wow slideInLeft" data-wow-iteration="1" data-wow-duration="0.9s">
        </div>
        <div class="text col-md-6">
          <h6 class="wow slideInRight slide-htext" data-wow-iteration="1" data-wow-duration="0.3s">Accessory's Trend</h6>
          <p class="wow slideInRight slide-ptext" data-wow-iteration="1" data-wow-duration="0.8s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          <button class="wow slideInRight btn btn-outline-secondary shopnow-btn" data-wow-iteration="1" data-wow-duration="1.2s">Shop Now</button>
        </div>
      </div>
    </div>
</div>

<a href="#carouselFade" class="carousel-control-prev" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>

<a href="#carouselFade" class="carousel-control-next" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>

<!-- END CAROUSEL -->

<!-- START SMART PHONE -->
<div class="container-fluid homebody">
	<div class="container-fluid category-con mb-4">
		<div class="row pt-5 pb-4">
			<?php
				$categoryname = [];
				$categories = [];
				$categorytypes = \DB::table('category_types')->get();
				foreach($categorytypes as $categorytype) {
					array_push($categories, $categorytype->name);
				}
				$count = count($categories);
				for($i = 0; $i < $count; $i++) {
					array_push($categoryname, $categories[$i]);
					$i += 1;
				}
			?>
			@foreach($categoryname as $category)
			<?php
				$enc_category = Crypt::encrypt($category);
			?>
			<div class="col-md-12 col-lg-4 col-xl-4">
				<div class="row">
					<div class="col-md-4 text-center">
						<span class="category-fa text-center">
							<i class="fa fa-mobile fa-4x pt-3"></i>
						</span>
					</div>
					<div class="col-md-8 text-center pb-3 category-text">
						<h4>{{ $category }}</h4>
						<p>{{ $category }} is dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur.</p>
						<a href="{{ '/categorytype/' . $enc_category }}" class="btn btn-outline-primary text-white">Read More</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>


	<div class="container-fluid latest-product">
		<h2 class="sub-h text-center pt-3">Latest Products</h2>
		<div class="heading-b text-center pb-4">
			<img src="{{ asset('image/border.png') }}" alt="" style="width: 300px";>
		</div>
		<div class="row">
			@foreach($latest_products as $latest_product)
				<?php

					$price = \DB::table('phone_details')->where('model', $latest_product['model'])
					->where('color', $latest_product['color'])->value('price');

					$id = $latest_product->id;

				?>
				<div class="col-sm-6 col-md-3 mb-3">
					<div class="card latest border-0 latest-card">
						<div class="card-body text-center pb-3">
							<img src="{{ '../../storage/images/'.$latest_product->image }}"
							alt="" class="img-fluid">
							<hr>
							<div class="row container justify-content-between m-0">
								<h5>{{ $latest_product['brand'] }}</h5>
								<span>{{ $latest_product['model'] }}</span>
								<span>{{ $price }}</span>
							</div>
						</div>
						<div class="hover-effect">
							<li>
								<i class="fa fa-shopping-cart"></i>
								<a href="{{ route('cart.edit', $id) }}"> Add to cart</a>
							</li>
							<li>
								<i class="fa fa-pencil-square-o"></i>
								<a href="{{ 'detail/' . $id }}"> Detail</a>
							</li>
							<li>
								<i class="fa fa-heart-o"></i>
								<a href="{{ '/wishlist-product/' . $id }}"> Wishlist
								</a>
							</li>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<span class="pull-right
		">{{ $latest_products->links() }}</span>
	</div>

	<div class="discount mt-5">
		<div class="discount-text text-center">
			<!-- <span class="beautiful-font">Discount For This Month</span> -->
		</div>

	</div>

	<div class="container-fluid pb-5 popular">
		<h2 class="sub-h text-center pt-5">Popular Products</h2>
		<div class="heading-b text-center pb-4">
			<img src="{{ asset('image/border.png') }}" alt="" style="width: 300px;">
		</div>
		<div class="row ltproduct">
			@foreach($popular_products as $popular_product)
				<?php
					$id = $popular_product['id'];
				?>
				<div class="col-sm-6 col-md-3 mb-3">
					<div class="card latest border-0 popular-card">
						<div class="card-body text-center pb-3">
							<img src="{{ asset('storage/images/' . $popular_product['image']) }}" alt="" class="img-fluid">
							<hr>
							<div class="row container justify-content-between m-0">
								<h5>{{ $popular_product['brand'] }}</h5>
								<span>{{ $popular_product['model'] }}</span>
								<span>{{ $popular_product['price'] }}</span>
							</div>
						</div>
						<div class="hover-effect">
							<li>
								<i class="fa fa-shopping-cart"></i>
								<a href="{{ route('cart.edit', $id) }}"> Add to cart</a>
							</li>
							<li>
								<i class="fa fa-pencil-square-o"></i>
								<a href="{{ '/detail/' . $id }}"> Detail</a>
							</li>
							<li>
								<i class="fa fa-heart-o"></i>
								<a href="{{ url('/wishlist-product/' . $id) }}"> Wishlist</a>
							</li>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<!-- END SMART PHONE -->

	<!-- START PRODUCT -->

	<div class="container-fluid pt-5 pb-5 feature">
		<h3 class="sub-h text-center">Featured Products</h3>
		<div class="heading-b text-center pb-4">
			<img src="{{ asset('image/border.png') }}" alt="" style="width: 300px;">
		</div>
		<div class="row">
			@foreach($feature_products as $feature_product)
			<?php
				$price = \DB::table('featured_details')->where('model', $feature_product->model)
				->where('color', $feature_product->color)->value('price');
			?>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
				<div class="card border-0 feature-card pt-3">
					<div class="row">
						<div class="col-md-6 text-center pb-3 pt-3">
							<img src="{{ asset('/storage/images/' . $feature_product->image) }}" id="image">
						</div>
						<div class="col-md-6 pb-3 pt-3">
							<h5 class="des">{{ $feature_product->brand }}</h5>
							<h6 class="des">{{ $feature_product->model }}</h6>
							<h5 style="color: green">{{ $price }}</h5>
							<div class="container row justify-content-between mt-2">
								<a href="{{ '/wishlist-product/' . $feature_product->id }}" style="color: green">
									<span class="fa fa-heart"> Wishlist</span></a>
								<a href="{{ '/detail/' . $feature_product->id }}" style="color: green">
									<span class="fa fa-edit"> Detail</span></a>
							</div>

							<a href="{{ route('cart.edit', $feature_product->id) }}" class="btn btn-outline-success btn-sm mt-3">
								Add to card
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<!-- END PRODUCT -->

	<!-- START BRAND -->

	<div class="container-fluid pt-4 brand">
		<h2 class="text-center sub-h">Available Brand</h2>
		<div class="heading-b text-center pb-4">
			<img src="{{ asset('image/border.png') }}" alt="" style="width: 300px;">
		</div>
		<div class="carousel slide" data-ride="carousel" id="mySlide" data-interval="1000">
			<div class="carousel-inner">
	    		<div class="carousel-item active row">
	    			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
	      				<img class="logo" src="{{ asset('image/logo7.jpg') }}">
	      			</div>
	      			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
	      				<img class="logo" src="{{ asset('image/logo9.png') }}">
	      			</div>
	      			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
	      				<img class="logo" src="{{ asset('image/logo4.jpg') }}">
	      			</div>
	      			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
	      				<img class="logo" src="{{ asset('image/logo5.jpg') }}">
	      			</div>
	      			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
	      				<img class="logo" src="{{ asset('image/logo3.jpg') }}">
	      			</div>
	      			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
	      				<img class="logo" src="{{ asset('image/logo6.jpg') }}">
	      			</div>
	    		</div>

	    		<div class="carousel-item row">
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo13.jpg') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo14.jpeg') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo15.jpg') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo16.jpeg') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo17.jpg') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo18.png') }}">
		  			</div>
				</div>


				<div class="carousel-item row">
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo5.jpg') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo3.jpg') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo6.jpg') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo7.jpg') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo9.png') }}">
		  			</div>
		  			<div class="col-lg-2 col-md-4 col-sm-6 text-center mb-3">
		  				<img class="logo" src="{{ asset('image/logo4.jpg') }}">
		  			</div>
				</div>
			</div>
			<a href="#mySlide" class="carousel-control-prev" data-slide="prev">
				<i class="fa fa-arrow-circle-left fa-3x"></i>
			</a>

			<a href="#mySlide" class="carousel-control-next" data-slide="next">
				<i class="fa fa-arrow-circle-right fa-3x"></i>
			</a>
		</div>
	</div>

	<!-- END BRAND -->
</div>

@endsection
