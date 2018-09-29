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
    .noresult {
        font-size: 40px;
        color: white;
        background: rgba(51, 126, 252, 0.5);
    }
</style>

<div class="container-fluid mt-3 mb-5">
	<h2 class="text-center sub-h">All Results</h2>
	<div class="heading-b text-center pb-3">
		<img src="{{ asset('image/border.png') }}" alt="" style="width: 180px";>
	</div>	
    <div class="row">

        <?php $text = null; ?>
        @foreach($products as $product)
            @if(count($product) == 0)
                <?php $text = "There is no result!"; ?>
            @else
                @foreach($product as $p)
                    <?php 
                        if($p->category_type == 'Smartphone' || $p->category_type == 'Tablet') {
                            $price = \DB::table('phone_details')
                            ->where('model', $p->model)
                            ->where('color', $p->color)->value('price');
                        }
                        else {
                            $price = \DB::table('featured_details')
                            ->where('model', $p->model)
                            ->where('color', $p->color)->value('price');
                        }
                    ?>
                    <div class="col-md-3">
                        <div class="card text-center parent_card">
                            <div class="image_hover">
                                <img class="img-fluid image_design" src="{{ asset('/storage/images/'. $p->image) }}">
                                <a href="{{ url('/detail/' . $p->id) }}">
                                <div class="quick_view">Quick View</div>
                                </a>
                            </div>
                            <div class="content_price">{{ $p->brand }} {{ $p->model }}
                            {{ $price }}
                            </div>	<br>

                            <div class="card-block quick_hover">
                                            
                                <span class="fa fa-heart des pull-left" style="font-size: 13px;">
                                    <a href="{{ url('/wishlist/' . $p->id) }}"> Wishlist</a>
                                </span>
                                <span class="fa fa-edit des pull-right" style="font-size: 13px;">
                                <a href="{{ url('/detail/' . $p->id) }}"> Detail</a></span>
                                <br>
                                <a href="{{ route('cart.edit', $p->id) }}" class="btn btndesign"><i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;Add To Cart</i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @endforeach
        @if($text == null)
            <div class="noresult jumbotron col-md-12 text-center rounded-0">{{ $text }}</div>
        @endif
    </div>				
</div>

@endsection