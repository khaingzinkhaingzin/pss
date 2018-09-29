<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    public function index()
    {
        //
        return view('category.index');
    }

    public function data(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $datas = Category::all();

            foreach ($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'name' => $value->name,
                ]);
            }

            return Datatables::of($model)
            ->addColumn('edit', function($model) {
                return view('category.partials.edit_btn', compact('model'))->render();
            })
            ->addColumn('delete', function($model) {
                return view('category.partials.delete_btn', compact('model'))->render();
            })
            ->rawColumns(['edit', 'delete'])
            ->make('ture');
        }

        return abort(404);

    }

    public function create()
    {
        //
        return view('category.create');
    }

    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'category' => 'required',
        ]);
        
        $categories = Category::all();

        if(count($categories) == 0) {
            Category::create([
                'name' => $request->category,
            ]);
        }

        else {
            $already = null;
            foreach ($categories as $category) {
                $cate = Str::lower($category->name);
                $r_category = Str::lower($request->category);
                if($cate == $r_category) {
                    $already = 'yes';
                }
            }

            if($already == null) {
                Category::create([
                    'name' => $request->category,
                ]);
            }
        }
        
        return redirect('categories');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        //
        $user = \Auth::user();
        if($user->is_admin == 1) {
            return view('category.edit', compact('id'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //
        \DB::table('categories')->where('id', $id)->update([
            'name' => $request->category,
        ]);
        return redirect('categories');
    }

    public function destroy(Category $category)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            $id = $category->id;
            Category::destroy($id);
            return redirect('categories');
        }
        else {
            return back();
        }
    }
}
