<?php

namespace App\Http\Controllers;

use App\OtherCost;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class OtherCostController extends Controller
{
    public function index()
    {
        //
        return view('othercost.index');
    }

    public function data(Request $request) {
        $model = new Collection;

        if($request->ajax()) {
            $datas = OtherCost::all();
            foreach ($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'name' => $value->name,
                    'price' => $value->price,
                    'start_day' => $value->start_day,
                    'start_month_year' => $value->start_month_year,
                    'expire_day' => $value->expire_day,
                    'expire_month_year' => $value->expire_month_year,
                ]);
            }

            return Datatables::of($model)
            ->addColumn('edit', function($model) {
                return view('othercost.partials.edit_btn', compact('model'));
            })
            ->addColumn('delete', function($model) {
                return view('othercost.partials.delete_btn', compact('model'));
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
        }
    }

    public function create()
    {
        //

        return view('othercost.create');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required', 
            'start_date' => 'required', 
            'expire_date' => 'required',
        ]);

        $start_date = $request->start_date;
        $start_day = Carbon::parse($start_date)->format('d');
        $start_month = Carbon::parse($start_date)->format('F');
        $start_year = Carbon::parse($start_date)->format('Y');
        $start_month_year = $start_month . " " . $start_year;

        $expire_date = $request->expire_date;
        $expire_day = Carbon::parse($expire_date)->format('d');
        $expire_month = Carbon::parse($expire_date)->format('F');
        $expire_year = Carbon::parse($expire_date)->format('Y');
        $expire_month_year = $expire_month . " " . $expire_year;

        OtherCost::create([
            'name' => $request->name,
            'price' => $request->price,
            'start_day' => $start_day,
            'start_month_year' => $start_month_year,
            'expire_day' => $expire_day,
            'expire_month_year' => $expire_month_year,
        ]);

        return redirect('/othercosts/');
    }

    public function show(OtherCost $otherCost)
    {
        //
    }

    public function edit($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            return view('othercost.edit', compact('id'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required', 
            'start_date' => 'required', 
            'expire_date' => 'required',
        ]);

        $start_date = $request->start_date;
        $start_day = Carbon::parse($start_date)->format('d');
        $start_month = Carbon::parse($start_date)->format('F');
        $start_year = Carbon::parse($start_date)->format('Y');
        $start_month_year = $start_month . " " . $start_year;

        $expire_date = $request->expire_date;
        $expire_day = Carbon::parse($expire_date)->format('d');
        $expire_month = Carbon::parse($expire_date)->format('F');
        $expire_year = Carbon::parse($expire_date)->format('Y');
        $expire_month_year = $expire_month . " " . $expire_year;

        OtherCost::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'start_day' => $start_day,
            'start_month_year' => $start_month_year,
            'expire_day' => $expire_day,
            'expire_month_year' => $expire_month_year,
        ]);


        return redirect('othercosts');
    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            OtherCost::destroy($id);

            return redirect('othercosts');
        }
        else {
            return back();
        }
    }
}
