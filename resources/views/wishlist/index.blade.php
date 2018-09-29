<script src="{{ asset('js/jquery.js') }}"></script>

@extends('layouts.master')

@section('content')

    <div class="container mt-5">

        <table class="table table-striped text-center">
            <h4 class="text-center">Wishlist Products</h4>
            <div class="heading-b text-center pb-4">
		        <img src="{{ asset('image/border.png') }}" alt="" style="width: 230px";>
	        </div>
            <thead>
                <th class="text-center">Id</th>
                <th class="text-center">Name</th>
                <th class="text-center">Price</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($wishlist_products as $wishlist_product)
                    <tr>
                        <td>{{ $wishlist_product->id }}</td>  
                        <td>{{ $wishlist_product->name }}</td>
                        <td>{{ $wishlist_product->price }}</td>
                        <?php 
                         $id = Illuminate\Support\Facades\Crypt::encrypt($wishlist_product->id);
                        ?>
                        <td><a href="{{ route('cart.edit', $id) }}"  class="btn btn-info mb-5">Add to cart</a></td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <!-- <td>Grand Total : {{ Cart::subtotal() }}</td> -->
                    <!-- <td style="width: 200px;">Quantity : {{ Cart::count() }}</td> -->
                </tr>           
            </tbody>
        </table>
        
        <a href="{{ '/' }}" class="btn btn-info mb-5">Continue Shopping</a>
        <!-- <a href="{{ '/checkout' }}" class="btn btn-info mb-5 checkout" value="">Checking out</a> -->

    </div>

@stop


<script>
	$(document).ready(function() {
		$.ajax({
			url: "/checkout/check-out",
			type: "GET",
			dataType: "json",
			success: function(data) {
				alert(data);
			}
		});
	});
</script>