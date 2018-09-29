<script src="{{ asset('js/jquery.js') }}"></script>

@extends('layouts.master')

@section('title', 'add to cart page')

@section('content')

	<div class="container">
		<h3 class="pt-5 pb-1 text-center">Product List want to buy</h3>
		<div class="heading-b text-center pb-4">
			<img src="{{ asset('image/border.png') }}" 
			alt="" style="width: 330px";>
		</div>
		<table class="table table-striped mb-5">
			<thead>
				<tr>
					<th>Category</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Color</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
			@foreach($cart_products as $cart_product)
				<tr>
					<td>{{ $cart_product->category }}</td>
					<td>{{ $cart_product->brand }}</td>
					<td>{{ $cart_product->model }}</td>
					<td>{{ $cart_product->color }}</td>
					<td>
						<div>
							<input type="text" class="qty" value="{{ $cart_product->quantity }}"
							style="width: 25px;">
						</div>
					</td>
					<td>{{ $cart_product->price }}</td>
					<td>
						<!-- <input type="text" value="{{ $cart_product->price }}" style="border-style: none;"
						class="amount"> -->
						<input type="hidden" value="{{ $cart_product->price }}"
						id="price_{{ $cart_product->id }}">
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="row mb-5 justify-content-center">
			<a href="/" class="btn btn-success mr-1">Continue Shopping</a>
			<a href="" class="btn btn-success">Checkout</a>
		</div>
	</div>
  
@stop


<script>
	$(function() {
		$("td>div").append('<div class="inc button">+</div>
		<div class="dec button">-</div>');
	});
</script>

<script>
	$(document).ready(function() {
		$("input[type='button']").on('click', function() {
			$value = $(this).val();
			var oldValue = parseInt($('.qty').val());
			var newValue = 0;

			var oldAmount = parseInt($('.amount').val());
			var price = parseInt($('.price').val());
			var newAmount = 0;

			if($value == "-") {
				if(oldValue != 0 && oldAmount != 0) {
					newValue = oldValue - 1;
					newAmount = oldAmount - price;
				}
			}
			else {
				newValue = oldValue + 1;	
				newAmount = oldAmount + price;
			}

			$('.qty').val(newValue);
			$('.amount').val(newAmount);
		});
	});
</script>