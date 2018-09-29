<?php

namespace App\Http\Controllers;

use App\DoneSale;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;

class DoneSaleController extends Controller
{
    public function index()
    {
        //
        return view('donesale.index');
    }

    public function data(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $datas = DoneSale::all();
            foreach ($datas as $value) {
                $model->push([
                    'name' => $value->name,
                    'email' => $value->email,
                    'image' => $value->image,
                    'category_type' => $value->category_type,
                    'category' => $value->category,
                    'brand' => $value->brand,
                    'model' => $value->model,
                    'color' => $value->color,
                    'quantity' => $value->quantity,
                    'price' => $value->price,
                    'day' => $value->day,
                    'month_year' => $value->month_year,
                ]);
            }
            return Datatables::of($model)
            ->editColumn("image", function($model) {
                $data = "<img src='../../storage/images/".$model['image']."' alt='' width='100' height='100'>";
                return $data;
            })
            ->rawColumns(['image'])
            ->make(true);
        }   
        return abort(404);     
    }

    public function create()
    {
        
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
     * @param  \App\DoneSale  $doneSale
     * @return \Illuminate\Http\Response
     */
    public function show(DoneSale $doneSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoneSale  $doneSale
     * @return \Illuminate\Http\Response
     */
    public function edit(DoneSale $doneSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoneSale  $doneSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoneSale $doneSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoneSale  $doneSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoneSale $doneSale)
    {
        //
    }
}
