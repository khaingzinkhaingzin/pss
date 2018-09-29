<?php

namespace App\Http\Controllers;

use App\AddToCart;
use App\SaleProduct;
use App\Cost;

use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) 
    {
        //
        $user_id = \Auth::user()->id;
        $saleproduct = SaleProduct::find($id);
        $price = Cost::where('sale_or_service', 0)
        ->where('model', $saleproduct->model)
        ->where('color', $saleproduct->color)
        ->value('price');
        \DB::table('add_to_carts')->insert([
            'user_id' => $user_id,
            'category' => $saleproduct->category,
            'brand' => $saleproduct->brand,
            'model' => $saleproduct->model,
            'color' => $saleproduct->color,
            'price' => $price,
            'quantity' => 1,
        ]);
        return redirect('add-to-cart/show/' . $user_id);
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
     * @param  \App\AddToCart  $addToCart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart_products = AddToCart::where('user_id', $id)->get();

        return view('add-to-cart', compact('cart_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AddToCart  $addToCart
     * @return \Illuminate\Http\Response
     */
    public function edit(AddToCart $addToCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AddToCart  $addToCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddToCart $addToCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AddToCart  $addToCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddToCart $addToCart)
    {
        //
    }
}
