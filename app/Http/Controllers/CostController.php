<?php

namespace App\Http\Controllers;

use App\Cost;
use App\PhoneBrand;
use App\Category;
use App\PhoneModel;
use App\ServiceProduct;
use App\SaleProduct;
use App\CustomerService;
use App\CategoryType;
use App\DoneSale;
use App\ServiceModel;
use App\OtherCost;
use App\EmployeeSalary;

use Carbon\Carbon;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CostController extends Controller
{

    public function __construct() {
        $saleproducts = SaleProduct::all();
        foreach ($saleproducts as $saleproduct) {
            if($saleproduct->quantity == 0) {
                SaleProduct::destroy($saleproduct->id);
            }
        }
    }

    public function index()
    {
        //
        $month_years = Cost::pluck('month_year')->unique();
        // var_dump($month_years);
        return view('cost.index', compact('month_years'));
        
    }

    public function data(Request $request) {
            $model = new Collection;

            if($request->ajax()) {
                $datas = Cost::all();
                foreach ($datas as $value) {

                        $model->push([
                            'id'    => $value->id,
                            'category' => $value->category,
                            'brand'  => $value->brand,
                            'model' => $value->model,
                            'color' => $value->color,
                            'quantity' => $value->quantity,
                            'price'  => $value->price,
                            'cost' => $value->cost,
                            'sale_or_service' => $value->sale_or_service,
                            'day' => $value->day,
                            'month_year' => $value->month_year,
                            'image' => $value->image,

                    ]);
                }
             
               
                return  Datatables::of($model)
                ->addColumn('sale_service', function($model) {
                    if($model['sale_or_service'] == 0) {
                        return 'Sale';
                    }
                    else {
                        return 'Service';
                    }
                }) 
                ->addColumn("image", function($model) {
                    $data = "<img src='../../storage/images/".$model['image']."' alt='' width='100' height='100'>";
                    return $data;
                })
                ->addColumn('edit', function($model) {
                    return view('cost.partials.edit_btn', compact('model'));
                })
                ->addColumn('delete', function($model) {
                    return view('cost.partials.delete_btn', compact('model'));
                })
                ->rawColumns(['edit', 'delete', 'image'])
                ->make(true);
            }
            return abort(404);
            
        }

    public function create()
    {
        //

        $categorytypes = CategoryType::pluck('name');
        $categories = Category::pluck('name');
        $brands = PhoneBrand::pluck('name');
        $models = PhoneModel::pluck('name');

        return view('cost.create', compact('categorytypes', 'categories', 'brands', 'models'));
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'category_type' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'sale_or_service' => 'required',
            'date' => 'required',
            'file' => 'required',
        ]);

        $cost = $request->price * $request->quantity;
        $date = $request->date;
        $day = Carbon::parse($date)->format('d');
        $month = Carbon::parse($date)->format('F');
        $year = Carbon::parse($date)->format('Y');
        $m_y = $month . " " . $year;

        $file = $request->file('file');
        $filename = uniqid().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $filename);

        //insert into cost table
        Cost::create([
            'category_type' => $request->category_type,
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'cost' => $cost,
            'sale_or_service' => $request->sale_or_service,
            'day' => $day,
            'month_year' => $m_y,
            'image' => $filename,
        ]);

        //insert into sale product or service product

        if($request->sale_or_service == 1) {
            $service_products = ServiceProduct::all();
            if(count($service_products) == 0) {
                ServiceProduct::create([
                   'category' => $request->category,
                   'brand' => $request->brand,
                   'model' => $request->model,
                   'color' => $request->color,
                   'quantity' =>  $request->quantity,
                ]);
            }

            else {
                $already = null;
                foreach ($service_products as $service_product) {
                    $sp_category = Str::lower($service_product->category);
                    $sp_brand = Str::lower($service_product->brand);
                    $sp_model = Str::lower($service_product->model);
                    $sp_color = Str::lower($service_product->color);

                    $request_category = Str::lower($request->category);
                    $request_brand = Str::lower($request->brand);
                    $request_model = Str::lower($request->model);
                    $request_color = Str::lower($request->color);

                    if($sp_category == $request_category && $sp_brand == $request_brand && $sp_model == $request_model && $sp_color == $request_color) {
                        $already = $service_product->id;
                    }

                }
                if($already == null) {
                    ServiceProduct::create([
                       'category' => $request->category,
                       'brand' => $request->brand,
                       'model' => $request->model,
                       'color' => $request->color,
                       'quantity' =>  $request->quantity,
                    ]);
                }
                else {
                    $qty = ServiceProduct::where('id', $already)->value('quantity');
                    $qty += $request->quantity;
                    ServiceProduct::where('id', $already)->update([
                        'quantity' => $qty,
                    ]);
                }
            }
        }



        else {
            $sale_products = SaleProduct::all();
            if(count($sale_products) == 0) {
                SaleProduct::create([
                   'category_type' => $request->category_type,
                   'category' => $request->category,
                   'brand' => $request->brand,
                   'model' => $request->model,
                   'color' => $request->color,
                   'quantity' =>  $request->quantity,
                   'image' => $filename,
                ]);
            }
            else {
                $already = null;
                foreach ($sale_products as $sale_product) {
                    $sap_categorytype = Str::lower($sale_product->category_type);
                    $sap_category = Str::lower($sale_product->category);
                    $sap_brand = Str::lower($sale_product->brand);
                    $sap_model = Str::lower($sale_product->model);
                    $sap_color = Str::lower($sale_product->color);

                    $request_categorytype = Str::lower($request->category_type);
                    $request_category = Str::lower($request->category);
                    $request_brand = Str::lower($request->brand);
                    $request_model = Str::lower($request->model);
                    $request_color = Str::lower($request->color);

                    if($sap_categorytype == $request_categorytype && $sap_category == $request_category 
                    && $sap_brand == $request_brand && $sap_model == $request_model 
                    && $sap_color == $request_color) {
                        $already = $sale_product->id;
                    }
                }
                if($already == null) {
                    SaleProduct::create([
                       'category_type' => $request->category_type,
                       'category' => $request->category,
                       'brand' => $request->brand,
                       'model' => $request->model,
                       'color' => $request->color,
                       'quantity' =>  $request->quantity,
                       'image' => $filename,
                    ]);
                }
                else {
                    $qty = SaleProduct::where('id', $already)->value('quantity');
                    $qty += $request->quantity;
                    SaleProduct::where('id', $already)->update([
                        'category_type' => $request->category_type,
                        'category' => $request->category,
                        'brand' => $request->brand,
                        'model' => $request->model,
                        'color' => $request->color,
                        'quantity' => $qty,
                        'image' => $filename,
                    ]);
                }
            }
        }
        
        return redirect('costs');
    }

    public function show(Cost $cost)
    {
        //
    }

    public function edit($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            $categorytypes = CategoryType::pluck('name');
            $categories = Category::pluck('name');
            $brands = PhoneBrand::pluck('name');
            $models = PhoneModel::pluck('name');
            return view('cost.edit', 
            compact('id', 'categorytypes', 'categories', 'brands', 'models'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //
        $r_cost = $request->price * $request->quantity;
        $date = $request->date;
        $day = Carbon::parse($date)->format('d');
        $month = Carbon::parse($date)->format('F');
        $year = Carbon::parse($date)->format('Y');
        $m_y = $month . " " . $year;

        $file = $request->file('file');
        $filename = uniqid().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $filename);

        $model = Cost::where('id', $id)->value('model');
        $color = Cost::where('id', $id)->value('color');
        $qty = Cost::where('id', $id)->value('quantity');
        $c = Cost::where('id', $id)->value('cost');
        $sale_or_service = Cost::where('id', $id)->value('sale_or_service');

        $r_model = Str::lower($request->model);
        $r_color = Str::lower($request->color);

        //insert into cost table
        Cost::where('id', $id)->update([
            'category_type' => $request->category_type,
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'cost' => $r_cost,
            'sale_or_service' => $request->sale_or_service,
            'day' => $day,
            'month_year' => $m_y,
            'image' => $filename,
        ]);

        if($sale_or_service == 0) {
            $sale_qty = SaleProduct::where('model', $model)->where('color', $color)
            ->value('quantity');        
            $q = $sale_qty - $qty;

            SaleProduct::where('model', $model)->where('color', $color)->update([
                'quantity' => $q,
            ]);

            $already = null;
            $saleproducts = SaleProduct::all();
            foreach ($saleproducts as $saleproduct) {
                $s_model = Str::lower($saleproduct->model);
                $s_color = Str::lower($saleproduct->color);
                if($r_model == $s_model && $r_color == $s_color) {
                    $already = $saleproduct->id;
                }
            }

            if($already == null) {
                SaleProduct::create([
                    'category_type' => $request->category_type,
                    'category' => $request->category,
                    'brand' => $request->brand,
                    'model' => $request->model,
                    'color' => $request->color,
                    'quantity' => $request->quantity,
                    'image' => $filename,
                ]);
                $quantity = $qty - $request->quantity;
                SaleProduct::where('model', $model)->where('color', $color)->update([
                    'quantity' => $quantity
                ]);
            }

            else {
                $already_qty = SaleProduct::where('id', $already)->value('quantity');
                $new_qty =  $already_qty + $request->quantity;
                SaleProduct::where('id', $already)->update([
                    'category_type' => $request->category_type,
                    'category' => $request->category,
                    'brand' => $request->brand,
                    'model' => $request->model,
                    'color' => $request->color,
                    'quantity' => $new_qty,
                    'image' => $filename,
                ]);
            }
        }



        else {

            $already = null;
            $serviceproducts = ServiceProduct::all();
            foreach ($serviceproducts as $serviceproduct) {
                $sv_model = Str::lower($serviceproduct->model);
                $sv_color = Str::lower($serviceproduct->color);
                if($r_model == $sv_model && $r_color == $sv_color) {
                    $already = $serviceproduct->id;
                }
            }

            if($already == null) {
                ServiceProduct::create([
                    'category' => $request->category,
                    'brand' => $request->brand,
                    'model' => $request->model,
                    'color' => $request->color,
                    'quantity' => $request->quantity,
                    'image' => $filename,
                ]);
                $service_qty = ServiceProduct::where('model', $model)->where('color', $color)->value('quantity');
                $q = $service_qty - $qty;

                ServiceProduct::where('model', $model)->where('color', $color)->update([
                    'quantity' => $q,
                ]);
            }

            else {
                $already_qty = ServiceProduct::where('id', $already)->value('quantity');
                $new_qty = $already_qty + $request->quantity;
                ServiceProduct::where('id', $already)->update([
                    'category' => $request->category,
                    'brand' => $request->brand,
                    'model' => $request->model,
                    'color' => $request->color,
                    'quantity' => $new_qty,
                    'image' => $filename,
                ]);
            }
        }

        return redirect('costs');
    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            $cost = Cost::find($id);

            if($cost->sale_or_service == 0) {
                $s_qty = SaleProduct::where('model', $cost->model)
                ->where('color', $cost->color)->value('quantity');
                $qty = $s_qty - $cost->quantity;

                SaleProduct::where('model', $cost->model)->where('color', $cost->color)->update([
                    'quantity' => $qty,
                ]);
            }

            else {
                $sv_qty = ServiceProduct::where('model', $cost->model)
                ->where('color', $cost->color)->value('quantity');
                $q = $sv_qty - $cost->quantity;

                ServiceProduct::where('model', $cost->model)->where('color', $cost->color)->update([
                    'quantity' => $q,
                ]);
            }

            Cost::destroy($id);

            return redirect('costs');
        }
        else {
            return back();
        }
    }

    public function servicecostIndex() {
        return view('cost.servicecost');
    }

    public function servicecost(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $datas = Cost::where('sale_or_service', 1)->get();
            foreach ($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'category' => $value->category,
                    'brand' => $value->brand,
                    'model' => $value->model,
                    'color' => $value->color,
                    'quantity' => $value->quantity,
                    'price' => $value->price,
                    'cost' => $value->cost,
                    'sale_or_service' => 'Service',
                    'date' => $value->date,
                ]);
            }
            return Datatables::of($model)->make(true);
        }
    }

    public function salecostIndex() {
        return view('cost.salecost');
    }

    public function salecost(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $datas = Cost::where('sale_or_service', 0)->get();
            foreach ($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'category_type' => $value->category_type,
                    'category' => $value->category,
                    'brand' => $value->brand,
                    'model' => $value->model,
                    'color' => $value->color,
                    'quantity' => $value->quantity,
                    'price' => $value->price,
                    'cost' => $value->cost,
                    'sale_or_service' => 'Sale',
                    'date' => $value->date,
                ]);
            }
            return Datatables::of($model)->make(true);
        }   
    }

    public function getProfitForService($my) {
        $total_cost = 0;
        $income = 0;
        $profit = 0;
        $result = [];
        $qty_ary = [];
        $cost_ary = [];

        $collection = new Collection;
        $new_collection = new Collection;

        $costs = Cost::where('month_year', $my)->where('sale_or_service', 1)->get();


        foreach ($costs as $cost) {
            $collection->push([
                'model' => $cost->model,
                'color' => $cost->color,
                'price' => $cost->price,
                'qty' => $cost->quantity,
            ]);
        }

        // $new_collection = $collection->unique('model', 'color');

        foreach($collection as $col) {
            if(count($new_collection) == 0) {
                $new_collection->push([
                    'model' => $col['model'],
                    'color' => $col['color'],
                    'qty' => $col['qty'],
                    'price' => $col['price'],
                ]);
            }
            else {
                $already = null;
                foreach($new_collection as $new_col) {
                    if($new_col['model'] == $col['model'] && $new_col['color'] == $col['color']) {
                        $already = 'yes';     
                    }
                }
                if($already == null) {
                    $new_collection->push([
                        'model' => $col['model'],
                        'color' => $col['color'],
                        'qty' => $col['qty'],
                        'price' => $col['price'],
                    ]);
                }
            }
        }

        foreach ($new_collection as $new_col) {
            $qty = 0;
            foreach ($collection as $col) {
                if($new_col['model'] == $col['model'] && $new_col['color'] == $col['color']) {
                    $qty += $col['qty'];
                }
            }
            $qty_ary['quantity'] = $qty;
            $cost_ary[] = array_merge($new_col, $qty_ary); 
        }

        $service_products = ServiceProduct::all();

        foreach ($cost_ary as $c_ary) {
            $remaining = null;
            foreach ($service_products as $service_product) {
                if($c_ary['model'] == $service_product->model && $c_ary['color'] == $service_product->color) {
                    $q = $c_ary['quantity'] - $service_product->quantity;
                    $total_cost += $q * $c_ary['price'];
                    $remaining = 'yes';
                }
            }

            if($remaining == null) {
                $total_cost += $c_ary['price'] * $c_ary['quantity'];
            }
        }
        $customer_services = CustomerService::where('month_year', $my)->get();
        foreach ($customer_services as $customer_service) {
            $income += $customer_service->price;
        }

        $profit = $income - $total_cost;

        $result['total_cost'] = $total_cost;
        $result['income'] = $income;
        $result['profit'] = $profit;

        return $result;
    }

    public function getProfitForSale($my) {
        $total_cost = 0;
        $income = 0;
        $profit = 0;
        $result = [];
        $qty_ary = [];
        $cost_ary = [];

        $collection = new Collection;
        $new_collection = new Collection;

        $costs = Cost::where('month_year', $my)->where('sale_or_service', 0)->get();

        foreach ($costs as $cost) {
            $collection->push([
                'model' => $cost->model,
                'color' => $cost->color,
                'price' => $cost->price,
                'qty' => $cost->quantity,
            ]);
        }

        // $new_collection = $collection->unique('model', 'color');

        foreach($collection as $col) {
            if(count($new_collection) == 0) {
                $new_collection->push([
                    'model' => $col['model'],
                    'color' => $col['color'],
                    'qty' => $col['qty'],
                    'price' => $col['price'],
                ]);
            }
            else {
                $already = null;
                foreach($new_collection as $new_col) {
                    if($new_col['model'] == $col['model'] && $new_col['color'] == $col['color']) {
                        $already = 'yes';     
                    }
                }
                if($already == null) {
                    $new_collection->push([
                        'model' => $col['model'],
                        'color' => $col['color'],
                        'qty' => $col['qty'],
                        'price' => $col['price'],
                    ]);
                }
            }
        }

        foreach ($new_collection as $new_col) {
            $qty = 0;
            foreach ($collection as $col) {
                if($new_col['model'] == $col['model'] && $new_col['color'] == $col['color']) {
                    $qty += $col['qty'];
                }
            }
            $qty_ary['quantity'] = $qty;
            $cost_ary[] = array_merge($new_col, $qty_ary); 
        }

        $sale_products = SaleProduct::all();

        foreach ($cost_ary as $c_ary) {
            $remaining = null;
            foreach ($sale_products as $sale_product) {
                if($c_ary['model'] == $sale_product->model && $c_ary['color'] == $sale_product->color) {
                    $q = $c_ary['quantity'] - $sale_product->quantity;
                    $total_cost += $q * $c_ary['price'];
                    $remaining = 'yes';
                }
            }

            if($remaining == null) {
                $total_cost += $c_ary['price'] * $c_ary['quantity'];
            }
        }

        $done_sales = DoneSale::where('month_year', $my)->get();
        foreach ($done_sales as $done_sale) {
            $income += $done_sale->price;
        }

        $profit = $income - $total_cost;

        $result['total_cost'] = $total_cost;
        $result['income'] = $income;
        $result['profit'] = $profit;

        return $result;
    }

    public function getTotalProfit($my) {
        $sale = $this->getProfitForSale($my);
        $service = $this->getProfitForService($my);

        $sale_total_cost = $sale['total_cost'];
        $sale_income = $sale['income'];
        $sale_profit = $sale['profit'];

        $service_total_cost = $service['total_cost'];
        $service_income = $service['income'];
        $service_profit = $service['profit'];

        $total_cost = $sale_total_cost + $service_total_cost;
        $total_income = $sale_income + $service_income;
        $total_profit = $sale_profit + $service_profit;

        //Other Cost

        $other_costs = OtherCost::where('start_month_year', $my)->get();
        $othercost = 0;        
        foreach($other_costs as $other_cost) {
            $cost = $other_cost->price;
            if($other_cost->expire_month_year == $other_cost->start_month_year) {
                $othercost += $cost;
            }
            else {
                $e_value1 = explode(' ', $other_cost->start_month_year);
                $e_value2 = explode(' ', $other_cost->expire_month_year);
                $s_month = $e_value1[0];
                $e_month = $e_value2[0];
                $start_month = 0;
                $expire_month = 0;
                $count_month = 0;

                $start_month = date('m', strtotime($s_month));
                $expire_month = date('m', strtotime($e_month));
                for($i = $start_month; $i < $expire_month; $i++) {
                    $count_month += 1;
                }
                $costByMonth = round($cost / $count_month);
                $othercost += $costByMonth;
            }
        }

        // Employee Salary Cost
        $employee_salaries = EmployeeSalary::where('month_year', $my)->get();
        $salary_cost = 0;
        foreach($employee_salaries as $employee_salary) {
            $salary_cost += $employee_salary->salary;
        }

        $total_profit -= $othercost;
        $total_profit -= $salary_cost;
        $result = [];
        $result['total_cost'] = $total_cost;
        $result['other_cost'] = $othercost;
        $result['salary_cost'] = $salary_cost;
        $result['income'] = $total_income;
        $result['profit'] = $total_profit;

        return response()->json($result);
    }

    public function addOpenningCost($model, $color) {
        $service_product = ServiceProduct::where('model', $model)
        ->where('color', $color)->first();
        $cost = Cost::where('model', $model)
        ->where('color', $color)->first();
        $qty = $service_product->quantity;
        $c = $qty * $cost->price;
        $date = Carbon::now(); 
        $day = Carbon::parse($date)->format('d');
        $month = Carbon::parse($date)->format('F');
        $year = Carbon::parse($date)->format('Y');
        $m_y = $month . " " . $year;
        Cost::create([
            'category_type' => $cost->category_type,
            'category' => $cost->category,
            'brand' => $cost->brand,
            'model' => $cost->model,
            'color' => $cost->color,
            'quantity' => $qty,
            'price' => $cost->price,
            'cost' => $c,
            'sale_or_service' => $cost->sale_or_service,
            'day' => $day,
            'month_year' => $m_y,
        ]);

        return redirect('costs');
    }

    public function getOtherCost($my) {
        return $my;
    }

    public function getModel($brand) {
        $brandid = PhoneBrand::where('name', $brand)->value('id');
        $service_models = ServiceModel::where('brand_id', $brandid)->pluck('name', 'id');
        return response()->json($service_models);
    }

    public function showIndexYear() {
        $month_years = Cost::pluck('month_year')->unique();
        $year = [];
        foreach($month_years as $my) {
            $e_value = explode(' ', $my);
            array_push($year, $e_value[1]);
        }
        $years = array_unique($year);
        return view('cost.year.index', compact('years'));
    }

    public function getServiceProfitByYear($year) {
        $month = null;
        $months = [];
        $lists = [];
        $result = [];
        $total_cost = 0;
        $income = 0;
        $profit = 0;
        for($m = 1; $m <= 12; $m++) {
            $month = date('F', mktime(0, 0, 0, $m));
            array_push($months, $month);
        }
        foreach($months as $month) {
            $my = $month . " " . $year;
            array_push($lists, $this->getProfitForService($my));
        }
        foreach($lists as $list) {
            $total_cost += $list['total_cost'];
            $income += $list['income'];
            $profit += $list['profit'];
        }
        $result['total_cost'] = $total_cost;
        $result['income'] = $income;
        $result['profit'] = $profit;
        return $result;
    }

    public function getSaleProfitByYear($year) {
        $month = null;
        $months = [];
        $lists = [];
        $result = [];
        $total_cost = 0;
        $income = 0;
        $profit = 0;
        for($m = 1; $m <= 12; $m++) {
            $month = date('F', mktime(0, 0, 0, $m));
            array_push($months, $month);
        }
        foreach($months as $month) {
            $my = $month . " " . $year;
            array_push($lists, $this->getProfitForSale($my));
        }
        foreach($lists as $list) {
            $total_cost += $list['total_cost'];
            $income += $list['income'];
            $profit += $list['profit'];
        }
        $result['total_cost'] = $total_cost;
        $result['income'] = $income;
        $result['profit'] = $profit;
        return $result;
    }

    public function getTotalProfitByYear($year) {
        $month = null;
        $months = [];
        $result = [];
        $total_cost = 0;
        $income = 0;
        $profit = 0;
        $num_of_year = 0;
        $price = 0;
        $salary = 0;

        $sale = $this->getSaleProfitByYear($year);

        $service = $this->getServiceProfitByYear($year);

        $total_cost = $sale['total_cost'] + $service['total_cost'];
        $income = $sale['income'] + $service['income'];
        $profit = $sale['profit'] + $service['profit'];
        
        //Other Cost

        $othercosts = OtherCost::all();
        foreach($othercosts as $othercost) {
            $start_evalue = explode(" ", $othercost->start_month_year);
            $expire_evalue = explode(" ", $othercost->expire_month_year);
            $start_year = $start_evalue[1];
            $expire_year = $expire_evalue[1];

            if($start_year == $year) {
                if($start_year == $expire_year) {
                    $price += $othercost->price;
                }
                else {
                    for($i = $start_year; $i < $start_year; $i++) {
                        $num_of_year += 1;
                    }
                    $price = $othercost->price / $num_of_year;
                }
            }
        }

        $employeesalaries = EmployeeSalary::all();
        foreach($employeesalaries as $employeesalary) {
            $year_evalue = explode(" ", $employeesalary->month_year);
            $emp_year = $year_evalue[1];
            if($emp_year == $year) {
                $salary += $employeesalary->salary;
            }
        }
        
        $result['total_cost'] = $total_cost + $price + $salary;
        $result['income'] = $income;
        $result['profit'] = $profit - ($salary + $price);
        $result['other_cost'] = $price;
        $result['salary_cost'] = $salary;
        
        return response()->json($result);
    }
}
