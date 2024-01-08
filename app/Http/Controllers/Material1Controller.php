<?php

namespace App\Http\Controllers;

use App\Models\Material1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Material1Controller extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? '5';
        $material1s = Material1::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('material1s.index', [
            'material1s' => $material1s,
        ]);
    }

    public function create()
    {
        return view('material1s.create');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:material1,name',
            'sku' => 'required|unique:material1,sku'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Material1::create([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        return redirect('/material1s?orderBy=created_at&order=desc')->with('success', 'Material1 berhasil ditambahkan');
    }

    public function edit($id)
    {
        $material1 = Material1::find($id);

        if (!$material1) {
            return back()->with('warning', 'Material1 tidak ditemukan');
        }

        return view('material1s.edit', [
            'material1' => $material1,
        ]);
    }

    public function update(Request $req, $id)
    {
        $material1 = Material1::find($id);

        if (!$material1) {
            return back()->with('warning', 'Material1 tidak ditemukan');
        }

        $validatorRules = [
            'name' => 'required',
            'sku' => 'required',
        ];

        if ($req->name != $material1->name) {
            $validatorRules['name'] = 'required|unique:material1,name';
        }

        if ($req->sku != $material1->sku) {
            $validatorRules['sku'] = 'required|unique:material1,sku';
        }

        $validator = Validator::make($req->all(), $validatorRules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $material1->update([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        $query = str_replace('/material1s/' . $id, '', request()->getRequestUri());

        return redirect('/material1s/' . $query)->with('success', 'Material1 berhasil diubah');
    }

    public function destroy($id)
    {
        $material1 = Material1::find($id);

        if (!$material1) {
            return back()->with('warning', 'Material1 tidak ditemukan');
        }

        $material1->delete();

        $query = str_replace('/material1s/' . $id, '', request()->getRequestUri());
        return redirect('/material1s' . $query)->with('success', 'Material1 berhasil dihapus');
    }
}
