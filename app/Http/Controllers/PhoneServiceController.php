<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Carbon\Carbon;

use App\PhoneService;
use App\PhoneBrand;
use App\PhoneModel;
use App\ServiceProduct;
use App\CustomerService;
use App\ServiceModel;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;



class PhoneServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');

        $serviceproducts = ServiceProduct::all();
        foreach ($serviceproducts as $serviceproduct) {
            if($serviceproduct->quantity == 0) {
                ServiceProduct::destroy($serviceproduct->id);
            }
        }
        // $this->middleware('superadmin');
    }

    public function index()
    {
        return view('phoneservice.index');

    }

    public function data(Request $request) {
        $model = new Collection;
        
        if($request->ajax()) {
            $datas = PhoneService::all();
            foreach ($datas as $value) {
                $exp_date = $value->expire_date;
                $remain = Carbon::parse($exp_date)->diffInDays(now());

                    $model->push([
                        'id'    => $value->id,
                        'remaining_day' => $remain,
                        'name'  => $value-> name,
                        'brand' => $value->brand->name,
                        'model' => $value->model->name,
                        'error' => $value->error,
                        'accessory_name' => $value->accessory_name,
                        'accessory_model_no' => $value->accessory_model_no,
                        'date'  => $value->start_date,
                        'expire_date' => $value->expire_date,
                        'phone_no' => $value->phone_no,
                        'price' => $value->price,

                ]);
            }
            return  Datatables::of($model)
                ->addColumn("edit", function($model) {
                        return view('phoneservice.partials.edit', compact('model'))
                        ->render();
                })
                ->addColumn("delete", function($model) {
                    return view('phoneservice.partials.delete', compact('model'))->render();
                })
                ->addColumn("finish", function($model) {
                    return view('phoneservice.partials.finish', compact('model'))->render();
                })
                ->addColumn("print", function($model) {
                    return view('phoneservice.partials.print', compact('model'))->render();
                })
                ->addColumn("accessory", function($model) {
                    $acc_name = "";
                    foreach ($model['accessory_name'] as $acc) {
                        $acc_name .= ServiceProduct::where('id', $acc)->value('category').',';
                    }
                    return rtrim($acc_name, ',');
                })
                ->addColumn("accessory_model", function($model) {
                    $acc_model = "";
                    foreach ($model['accessory_model_no'] as $acc_model_no) {
                        $acc_model .= ServiceProduct::where('id', $acc_model_no)->value('model').',';
                    }
                    return rtrim($acc_model, ',');
                })
                ->rawColumns(['edit', 'delete', 'finish', 'print'])
                ->make(true);


            // return Datatables::of($model)
                
            //     ->addColumn("edit", function($model) {
            //         if (\Auth::user()->can("update_phone_service")) {
            //             $data = "<a class='btn btn-success' href=" . route("phoneservices.edit", $model->id) . ">Edit</a>";
            //             return $data;
            //         }
            //         else {
            //             return "";   
            //         }
            //     })
            //     ->addColumn("delete", function($model) {
            //         $data = '<form action="' . route('phoneservices.destroy', $model->id). '" method="post">'
            //                     . csrf_field() .
            //                      method_field("delete") .
            //                     '<button class="btn btn-danger">Delete</button>
            //                 </form>';
            //         return $data;
            //     })
            //     ->addColumn("print", function($model) {
            //         $data = "<a class='btn btn-success' id='print' href='phoneservices/" . $model->id . "/print'>Print</a>";
            //         return $data;  
            //     })
            //     ->addColumn("finish", function($model) {
            //         $data = "<a class='btn btn-success' href='phoneservices/" . $model->id . "/finish'>Finish</a>";
            //         return $data;  
            //     })
                // ->editColumn('brand', function($model) {
                //     return $model->brand->name;
                // })
                // ->editColumn('model', function($model) {
                //     return $model->model->name;
                // })
                // ->orderColumn('remaining_day', 'remaining_day $1')
                // ->rawColumns(['edit', 'delete','print', 'finish'])
                // ->make(true);
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
        $phonebrands = PhoneBrand::pluck('name', 'id');
        $phonemodels = PhoneModel::where('brand_id->name')->pluck('name', 'id');
        $accessory_names = ServiceProduct::pluck('category', 'id')->unique();
        $accessory_models = ServiceProduct::pluck('model', 'id')->unique();
        return view('phoneservice.create', compact('phonebrands', 'phonemodels', 
        'accessory_names', 'accessory_models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate datas
        $this->validate($request, [
            'name' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            'error' => 'required',
            'accessory_name' => 'required',
            'accessory_model_no' => 'required',
            'start_date' => 'required',
            'expire_date' => 'required',
            'phone_no' => 'required',
            'price' => 'required'
        ]);

        PhoneService::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'error' => $request->error,
            'accessory_name' => $request->accessory_name,
            'accessory_model_no' => $request->accessory_model_no,
            'start_date' => $request->start_date,
            'expire_date' => $request->expire_date,
            'phone_no' => $request->phone_no,
            'price' => $request->price,
        ]);
        return redirect('phoneservices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhoneService  $phoneService
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneService $phoneService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneService  $phoneService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = \Auth::user();
        if($user->is_admin == 1 || $user->can("update-phoneservice")) {
            $phonebrands = PhoneBrand::pluck('name', 'id');
            $phonemodels = PhoneModel::where('brand_id->name')->pluck('name', 'id');
            $accessory_names = ServiceProduct::pluck('category', 'id')->unique();
            $accessory_models = ServiceProduct::pluck('model', 'id')->unique();
            return view('phoneservice.edit',
            compact('id', 'phonebrands', 'phonemodels', 'accessory_names', 'accessory_models'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhoneService  $phoneService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate datas
        $this->validate($request, [
            'name' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            'error' => 'required',
            'accessory_name' => 'required',
            'accessory_model_no' => 'required',
            'start_date' => 'required',
            'expire_date' => 'required',
            'phone_no' => 'required',
            'price' => 'required'
        ]);
        // $input = Input::except('_token', '_method');

        $phoneservice = PhoneService::find($id);

        $phoneservice->name = $request->name;
        $phoneservice->brand_id = $request->brand_id;
        $phoneservice->model_id = $request->model_id;
        $phoneservice->error = $request->error;
        $phoneservice->accessory_name = $request->accessory_name;
        $phoneservice->accessory_model_no = $request->accessory_model_no;
        $phoneservice->start_date = $request->start_date;
        $phoneservice->expire_date = $request->expire_date;
        $phoneservice->phone_no = $request->phone_no;
        $phoneservice->price = $request->price;

        $phoneservice->save();
        
        return redirect('phoneservices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhoneService  $phoneService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = \Auth::user();
        if($user->is_admin == 1 || $user->can("update-phoneservice")) {
            PhoneService::destroy($id);
            return redirect('phoneservices');
        }
    }


    public function finish($id) {
      
        $phoneservice = PhoneService::find($id);

        $models = $phoneservice->accessory_model_no;

        foreach ($models as $model) {
            $model_name = ServiceProduct::where('id', $model)->value('model');
            $qty = ServiceProduct::where('model', $model_name)->value('quantity');
            $qty -= 1;
            ServiceProduct::where('model', $model_name)->update([
                'quantity' => $qty,
            ]);
        }

        // echo $phoneservices->quantity;

        $date = Carbon::now();
        $day = Carbon::parse($date)->format('d');
        $month = Carbon::parse($date)->format('F');
        $year = Carbon::parse($date)->format('Y');
        $m_y = $month . " " . $year;

        CustomerService::create([
            'name' => $phoneservice->name,
            'brand_id' => $phoneservice->brand_id,
            'model_id' => $phoneservice->model_id,
            'error' => $phoneservice->error,
            'accessory_name' => $phoneservice->accessory_name,
            'accessory_model_no' => $phoneservice->accessory_model_no,
            'day' => $day,
            'month_year' => $m_y,
            'phone_no' => $phoneservice->phone_no,
            'price' => $phoneservice->price,
        ]);
        
        PhoneService::destroy($id);

        return redirect('phoneservices');

    }

    public function print($id) {
        $phoneservice = PhoneService::find($id);
        return view('phoneservice.print', compact('phoneservice'));
    }

    public function getPhoneModels($brandid) {
        $service_model = ServiceModel::where('brand_id', $brandid)->pluck('name', 'id');
        return response()->json($service_model);
    }
}