<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Finishing;
use App\Models\Furniture;
use App\Models\Material1;
use App\Models\Material2;
use App\Models\Material3;
use App\Models\Material4;
use App\Models\StockOutSelect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockOutSelectController extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? 5;
        $with = ['applications', 'category', 'material1', 'material2', 'material3', 'material4', 'finishings', 'furniture_images'];
        $furnitures = Furniture::filter(request(['category', 'material1', 'material2', 'material3', 'material4', 'finishing', 'application', 'search']))->where('stock', '>', 0)->with($with)->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('stock_outs.selects.index', [
            'furnitures' => $furnitures,
            'stockoutselects' => StockOutSelect::orderBy('created_at', 'desc')->get(),
            'finishings' => Finishing::all(),
            'categories' => Category::all(),
            'applications' => Application::all(),
            'material1s' => Material1::all(),
            'material2s' => Material2::all(),
            'material3s' => Material3::all(),
            'material4s' => Material4::all(),
        ]);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'furniture_id' => 'required|numeric|unique:stock_out_select,furniture_id'
        ]);

        /**
         * run validator
         */
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        StockOutSelect::create([
            'furniture_id' => $req['furniture_id']
        ]);

        return back()->with('success', 'Furniture berhasil di pilih');
    }

    public function destroy($id)
    {
        if ($id == 'cancel') {
            StockOutSelect::truncate();
            return redirect('/stockouts');
        }

        $stock_outs_selected = StockOutSelect::find($id);

        if (!$stock_outs_selected) {
            return back()->with('warning', 'Data tidak ditemukan!');
        }

        $stock_outs_selected->delete();

        return back()->with('success', 'Furniture berhasil dikeluarkan');
    }
}
