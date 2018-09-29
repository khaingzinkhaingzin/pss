<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SaleProduct;
use App\PhoneDetail;
use App\FeaturedDetail;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $products = [];
        $name = $request->input('search');
        $data_as_category = SaleProduct::where('category', 'LIKE', '%' . $name . '%')->get();
        $data_as_brand = SaleProduct::where('brand', 'LIKE', '%' . $name . '%')->get();
        $data_as_model = SaleProduct::where('model', 'LIKE', '%' . $name . '%')->get();
        $data_as_color = SaleProduct::where('color', 'LIKE', '%' . $name . '%')->get();
        array_push($products, $data_as_category);
        array_push($products, $data_as_brand);
        array_push($products, $data_as_model);
        array_push($products, $data_as_color);
        return view('search.index', compact('products'));
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
