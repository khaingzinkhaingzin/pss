<script src="{{ asset('js/jquery.js') }}"></script>

@extends('layouts.master')

@section('content')

    <div class="container mt-5">

        <table class="table table-striped">
            <h4 class="text-center">Add To Cart Products</h4>
            <div class="heading-b text-center pb-4">
		        <img src="{{ asset('image/border.png') }}" alt="" style="width: 260px";>
	        </div>
            <thead>
                <th>id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->id }}</td>
                        <!-- <td>{{ $cartItem->rowId }}</td> -->
                        <td>{{ $cartItem->name }}</td>
                        <td>{{ $cartItem->price }}</td>
                        <td>
                            {!! Form::open(['route' => ['cart.update', $cartItem->rowId],
                            'method' => 'put']) !!}
                                <input style="width: 40px;" type="text" class="text-center"
                                value="{{ $cartItem->qty }}" name="qty">
                                <input type="submit" class="btn btn-default btn-sm" value="Ok">
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>Grand Total : {{ Cart::subtotal() }}</td>
                    <td style="width: 200px;">Quantity : {{ Cart::count() }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ '/home' }}" class="btn btn-info mb-5">Continue Shopping</a>
        <a href="{{ '/checkout' }}" class="btn btn-info mb-5 checkout" value="">Checking out</a>

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
