<?php

namespace App\Http\Controllers;

use App\Models\Material2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Material2Controller extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? '5';
        $material2s = Material2::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('material2s.index', [
            'material2s' => $material2s,
        ]);
    }

    public function create()
    {
        return view('material2s.create');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:material2,name',
            'sku' => 'required|unique:material2,sku'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Material2::create([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        return redirect('/material2s?orderBy=created_at&order=desc')->with('success', 'Material2 berhasil ditambahkan');
    }

    public function edit($id)
    {
        $material2 = Material2::find($id);

        if (!$material2) {
            return back()->with('warning', 'Material2 tidak ditemukan');
        }

        return view('material2s.edit', [
            'material2' => $material2,
        ]);
    }

    public function update(Request $req, $id)
    {
        $material2 = Material2::find($id);

        if (!$material2) {
            return back()->with('warning', 'Material2 tidak ditemukan');
        }

        $validatorRules = [
            'name' => 'required',
            'sku' => 'required',
        ];

        if ($req->name != $material2->name) {
            $validatorRules['name'] = 'required|unique:material2,name';
        }

        if ($req->sku != $material2->sku) {
            $validatorRules['sku'] = 'required|unique:material2,sku';
        }

        $validator = Validator::make($req->all(), $validatorRules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $material2->update([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        $query = str_replace('/material2s/' . $id, '', request()->getRequestUri());

        return redirect('/material2s/' . $query)->with('success', 'Material2 berhasil diubah');
    }

    public function destroy($id)
    {
        $material2 = Material2::find($id);

        if (!$material2) {
            return back()->with('warning', 'Material2 tidak ditemukan');
        }

        $material2->delete();

        $query = str_replace('/material2s/' . $id, '', request()->getRequestUri());
        return redirect('/material2s' . $query)->with('success', 'Material2 berhasil dihapus');
    }
}
