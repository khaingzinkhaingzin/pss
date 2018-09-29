@extends('layouts.master')	

@section('title', 'Smart Phone')

@section('content')

<style>
	body {
		background: linear-gradient(0deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.2)), url('{{ asset('image/bg1.jpg') }}');
		background-size: cover;
		background-attachment: fixed;
		background-repeat: no-repeat;
	}
</style>

<?php 
	$enc_category = Illuminate\Support\Facades\Crypt::encrypt($dec_categorytype);
?>
<div class="container-fluid mt-3 mb-5">
	<h2 class="text-center sub-h">{{ $dec_categorytype }}</h2>
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
                                @foreach($unique_brand as $u_brand)
									<?php 
										$enc_brand = Illuminate\Support\Facades\Crypt::encrypt($u_brand['brand']);
									?>

                                    <li>
                                        <a href="{{ url('/show/'. $enc_category . '/' . 
										$enc_brand) }}">{{ $u_brand['brand'] }}</a>
								    <li>
                                    <hr>
                                @endforeach
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
							<?php 
								$price_array = [];
							?>
							@foreach($new_collection as $new_col)
								<?php
									if($dec_categorytype == 'Smartphone' || $dec_categorytype == 'Tablet' ) {
										$price = \DB::table('phone_details')
										->where('model', $new_col['model'])
										->where('color', $new_col['color'])
										->value('price');
									}
									else {
										$price = \DB::table('featured_details')
										->where('model', $new_col['model'])
										->where('color', $new_col['color'])
										->value('price');
									}
									if($price >= 5000 && $price < 10000) {
										array_push($price_array, '5000 to 10000');
									}
									elseif($price >= 10000 && $price < 20000) {
										array_push($price_array, '10000 to 20000');
									}
									elseif($price >= 20000 && $price < 50000) {
										array_push($price_array, '20000 to 50000');
									}
									elseif($price >= 50000 && $price < 100000) {
										array_push($price_array, '50000 to 100000');
									}
									elseif($price >= 100000 && $price < 300000) {
										array_push($price_array, '100000 to 300000');
									}
									elseif($price >= 300000 && $price < 500000) {
										array_push($price_array, '300000 to 500000');
									}
									elseif($price >= 500000 && $price < 700000) {
										array_push($price_array, '500000 to 700000');
									}
									elseif($price >= 700000 && $price < 1000000) {
										array_push($price_array, '700000 to 1000000');
									}
								?>
							@endforeach
							<?php 
								$unique_parray = [];
								$unique_parray = array_unique($price_array);
							?>
							<ul>
								@foreach($unique_parray as $u_parray)
									<?php 
										$enc_price = Illuminate\Support\Facades\Crypt::encrypt($u_parray);
									?>
									<li><a href="{{ url('/show/' . $enc_category . '/price/' . $enc_price) }}">
										{{ $u_parray }}</a></li>
									<hr>
								@endforeach
							</ul>
						</div>
					</div>
				</div>

				@if($dec_categorytype == 'Feature')
					<div class="card brand-card rounded-0 mt-3">
						<div class="row m-0 card-header justify-content-between">Features
							<a class="badge badge-info" data-toggle="collapse" data-target="#accessories" data-parent="#slideParent">
								<i class="fa fa-arrow-circle-right fa-2x"></i>
							</a>
						</div>
						<div class="collapse" id="accessories">
							<div class="card-body pt-3">
								<ul>
									@foreach($unique_category as $u_category)
									<?php 
										$enc_ucategory = Illuminate\Support\Facades\Crypt::encrypt($u_category['category']);
									?>
									<li><a href="{{ url('/show/' . $enc_category . '/' .  
									$enc_ucategory) }}">
										{{ $u_category['category'] }}</a></li>
									<hr>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				@endif

				@if($dec_categorytype == 'Accessory')
					<div class="card brand-card rounded-0 mt-3">
						<div class="row m-0 card-header justify-content-between">Accessories
							<a class="badge badge-info" data-toggle="collapse" data-target="#accessories" data-parent="#slideParent">
								<i class="fa fa-arrow-circle-right fa-2x"></i>
							</a>
						</div>
						<div class="collapse" id="accessories">
							<div class="card-body pt-3">
								<ul>
									@foreach($unique_category as $u_category)
										<?php 
											$enc_ucategory = Illuminate\Support\Facades\Crypt::encrypt($u_category['category']);
										?>
										<li><a href="{{ url('/show/' . $enc_category . '/' .
										$enc_ucategory) }}">
											{{ $u_category['category'] }}</a></li>
										<hr>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				@endif

			</div>
		</div>

		<div class="col-md-9">	
			<div class="row">
                @foreach($new_collection as $new_col)
					<?php 
						if($new_col['category_type'] == 'Smartphone' || $new_col['category_type'] == 'Tablet') {
							$price = \DB::table('phone_details')
							->where('model', $new_col['model'])
							->where('color', $new_col['color'])->value('price');
						}
						else {
							$price = \DB::table('featured_details')
							->where('model', $new_col['model'])
							->where('color', $new_col['color'])->value('price');
						}
					?>
					<div class="col-md-4">
						<div class="card text-center parent_card">
  							<div class="image_hover">
  								<img class="img-fluid image_design" src="{{ asset('/storage/images/'. $new_col['image']) }}">
  							</div>
  							<div class="content_price">{{ $new_col['brand'] }} {{ $new_col['model'] }}
                              {{ $new_col['price'] }}
                              </div>	<br>

							<div class="card-block quick_hover">			
								<span class="fa fa-heart des pull-left" style="font-size: 13px; color:green;">
									<a href="{{ '/wishlist-product/' . $new_col['id']}}" style="color:green
									; text-decoration:none;"> Wishlist</a>
								</span>
								<span class="fa fa-edit des pull-right" style="font-size: 13px; color:green;">
									<a href="{{ '/detail/' . $new_col['id'] }}" style="color:green
									; text-decoration:none;"> Detail</a>
								</span>
								<br>
								<a href="{{ route('cart.edit', $new_col['id']) }}" class="btn btndesign">
								<i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;Add To Cart</i>
								</a>
						    </div>
						</div>
					</div>
                @endforeach
			</div>				
		</div>
	</div>
</div>

@endsection