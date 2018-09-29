<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\SaleProduct;
use App\PhoneDetail;
use App\FeaturedDetail;
use App\DoneSale;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $wishlist_products = Cart::instance('wishlist')->content();
        return view('wishlist.index', compact('wishlist_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = SaleProduct::find($id);
        $model = $product->model;
        $color = $product->color;
        if($product->category_type == 'Smartphone' || $product->category_type == 'Tablet') {
            $price = PhoneDetail::where('model', $model)
            ->where('color', $color)->value('price');
        }
        else {
            $price = FeaturedDetail::where('model', $model)
            ->where('color', $color)->value('price');
        }
        $name = $product->category . "," . $product->brand . "," . $product->model. "," . $product->color;
        Cart::instance('wishlist')->add($id, $name, 1, $price);
        
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
