<?php

namespace App\Http\Controllers;

use App\ServiceProduct;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class ServiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $serviceproducts = ServiceProduct::all();
        foreach ($serviceproducts as $serviceproduct) {
            if($serviceproduct->quantity == 0) {
                ServiceProduct::destroy($serviceproduct->id);
            }
        }
    }

    public function index()
    {
        //
        return view('serviceproduct.index');
    }

    public function data(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $serviceproducts = ServiceProduct::all();
            foreach ($serviceproducts as $serviceproduct) {
                $model->push([
                    'id' => $serviceproduct->id,
                    'category' => $serviceproduct->category,
                    'brand' => $serviceproduct->brand,
                    'model' => $serviceproduct->model,
                    'color' => $serviceproduct->color,
                    'quantity' => $serviceproduct->quantity,
                ]);
            }

            return Datatables::of($model)
            ->addColumn('openning_cost', function($model) {
                return view('serviceproduct.partials.openning_cost', compact('model'));
            })
            ->rawColumns(["openning_cost"])
            ->make(true);
        }
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
     * @param  \App\ServiceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProduct $serviceProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProduct $serviceProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProduct $serviceProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceProduct $serviceProduct)
    {
        //
    }
}
