<?php

namespace App\Http\Controllers;

use App\Models\Material3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Material3Controller extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? '5';
        $material3s = Material3::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('material3s.index', [
            'material3s' => $material3s,
        ]);
    }

    public function create()
    {
        return view('material3s.create');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:material3,name',
            'sku' => 'required|unique:material3,sku'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Material3::create([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        return redirect('/material3s?orderBy=created_at&order=desc')->with('success', 'Material3 berhasil ditambahkan');
    }

    public function edit($id)
    {
        $material3 = Material3::find($id);

        if (!$material3) {
            return back()->with('warning', 'Material3 tidak ditemukan');
        }

        return view('material3s.edit', [
            'material3' => $material3,
        ]);
    }

    public function update(Request $req, $id)
    {
        $material3 = Material3::find($id);

        if (!$material3) {
            return back()->with('warning', 'Material3 tidak ditemukan');
        }

        $validatorRules = [
            'name' => 'required',
            'sku' => 'required',
        ];

        if ($req->name != $material3->name) {
            $validatorRules['name'] = 'required|unique:material3,name';
        }

        if ($req->sku != $material3->sku) {
            $validatorRules['sku'] = 'required|unique:material3,sku';
        }

        $validator = Validator::make($req->all(), $validatorRules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $material3->update([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        $query = str_replace('/material3s/' . $id, '', request()->getRequestUri());

        return redirect('/material3s/' . $query)->with('success', 'Material3 berhasil diubah');
    }

    public function destroy($id)
    {
        $material3 = Material3::find($id);

        if (!$material3) {
            return back()->with('warning', 'Material3 tidak ditemukan');
        }

        $material3->delete();

        $query = str_replace('/material3s/' . $id, '', request()->getRequestUri());
        return redirect('/material3s' . $query)->with('success', 'Material3 berhasil dihapus');
    }
}
