<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;

class StatusController extends Controller
{
    public function index()
    {
        //
        return view('status.index');
    }

    public function data(Request $request) {
        $model = new Collection;

        if($request->ajax()) {
            $datas = Status::all();
            foreach($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'name' => $value->name,
                ]);
            }

            return Datatables::of($model)
            ->addColumn('edit', function($model) {
                return view('status.partials.edit_btn', compact('model'))->render();
            })
            ->addColumn('delete', function($model) {
                return view('status.partials.delete_btn', compact('model'))->render();
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
        }

        return abort(404);
    }


    public function create()
    {
        //
        return view('status.create');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
        ]);

        Status::create([
            'name' => $request->name,
        ]);

        return redirect('status');
    }

    public function show(Status $status)
    {
        //
    }

    public function edit($id)
    {
        //
        if(\Auth::user()->is_admin == 1 || \Auth::user()->can("update-status")) {
            $status = Status::find($id);
            return view('status.edit', compact('status', 'id'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //
        Status::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect('status');
    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1 || \Auth::user()->can("delete-status")) {
            Stauts::destroy($id);
            return redirect('status');
        }
        else {
            return back();
        }
    }
}
