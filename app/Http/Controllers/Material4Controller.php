<?php

namespace App\Http\Controllers;

use App\Models\Material4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Material4Controller extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? '5';
        $material4s = Material4::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('material4s.index', [
            'material4s' => $material4s,
        ]);
    }

    public function create()
    {
        return view('material4s.create');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:material4,name',
            'sku' => 'required|unique:material4,sku'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Material4::create([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        return redirect('/material4s?orderBy=created_at&order=desc')->with('success', 'Material4 berhasil ditambahkan');
    }

    public function edit($id)
    {
        $material4 = Material4::find($id);

        if (!$material4) {
            return back()->with('warning', 'Material4 tidak ditemukan');
        }

        return view('material4s.edit', [
            'material4' => $material4,
        ]);
    }

    public function update(Request $req, $id)
    {
        $material4 = Material4::find($id);

        if (!$material4) {
            return back()->with('warning', 'Material4 tidak ditemukan');
        }

        $validatorRules = [
            'name' => 'required',
            'sku' => 'required',
        ];

        if ($req->name != $material4->name) {
            $validatorRules['name'] = 'required|unique:material4,name';
        }

        if ($req->sku != $material4->sku) {
            $validatorRules['sku'] = 'required|unique:material4,sku';
        }

        $validator = Validator::make($req->all(), $validatorRules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $material4->update([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        $query = str_replace('/material4s/' . $id, '', request()->getRequestUri());

        return redirect('/material4s/' . $query)->with('success', 'Material4 berhasil diubah');
    }

    public function destroy($id)
    {
        $material4 = Material4::find($id);

        if (!$material4) {
            return back()->with('warning', 'Material4 tidak ditemukan');
        }

        $material4->delete();

        $query = str_replace('/material4s/' . $id, '', request()->getRequestUri());
        return redirect('/material4s' . $query)->with('success', 'Material4 berhasil dihapus');
    }
}
