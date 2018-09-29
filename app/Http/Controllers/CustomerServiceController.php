<?php

namespace App\Http\Controllers;

use App\CustomerService;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;

class CustomerServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('doneservice.index');
    }

    public function data(Request $request) {
        $model = new Collection;
        
        if($request->ajax()) {
            $datas = CustomerService::all();
            foreach ($datas as $value) {
                $model->push([
                    'id'    => $value->id,
                    'name'  => $value->name,
                    'brand' => $value->brand->name,
                    'model' => $value->model->name,
                    'error' => $value->error,
                    'date'  => $value->date,
                    'phone_no' => $value->phone_no,
                    'price' => $value->price,

                ]);
            }  
            return  Datatables::of($model)->make(true);
        }
        return abort(404);
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
     * @param  \App\CustomerService  $customerService
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerService $customerService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerService  $customerService
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerService $customerService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerService  $customerService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerService $customerService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerService  $customerService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerService $customerService)
    {
        //
    }
}
