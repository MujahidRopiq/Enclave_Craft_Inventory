<?php

namespace App\Http\Controllers;

use App\Models\Finishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinishingController extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? '5';
        $finishings = Finishing::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('finishings.index', [
            'finishings' => $finishings,
        ]);
    }

    public function create()
    {
        return view('finishings.create');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:finishing,name'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Finishing::create([
            'name' => $req['name']
        ]);

        return redirect('/finishings?orderBy=created_at&order=desc')->with('success', 'Finishing berhasil ditambahkan');
    }

    public function edit($id)
    {
        $finishing = Finishing::find($id);

        if (!$finishing) {
            return back()->with('warning', 'Finishing tidak ditemukan');
        }

        return view('finishings.edit', [
            'finishing' => $finishing,
        ]);
    }

    public function update(Request $req, $id)
    {
        $finishing = Finishing::find($id);

        if (!$finishing) {
            return back()->with('warning', 'Kategori tidak ditemukan');
        }

        $validatorRules = [
            'name' => 'required',
        ];

        if ($req->name != $finishing->name) {
            $validatorRules['name'] = 'required|unique:finishing,name';
        }

        $validator = Validator::make($req->all(), $validatorRules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $finishing->update([
            'name' => $req['name'],
        ]);

        $query = str_replace('/finishings/' . $id, '', request()->getRequestUri());

        return redirect('/finishings/' . $query)->with('success', 'Kategori berhasil diubah');
    }

    public function destroy($id)
    {
        $finishing = Finishing::find($id);

        if (!$finishing) {
            return back()->with('warning', 'Kategori tidak ditemukan');
        }

        $finishing->delete();

        $query = str_replace('/finishings/' . $id, '', request()->getRequestUri());
        return redirect('/finishings' . $query)->with('success', 'Kategori berhasil dihapus');
    }
}
