<?php

namespace App\Http\Controllers;

use App\Models\finishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderBy = 'name';
        $order = 'asc';

        switch (request('orderBy')) {
            case 'nameAsc':
                $orderBy = 'name';
                $order = 'asc';
                break;
            case 'nameDesc':
                $orderBy = 'name';
                $order = 'desc';
                break;
            case 'newest':
                $orderBy = 'created_at';
                $order = 'desc';
                break;
            case 'oldest':
                $orderBy = 'created_at';
                $order = 'asc';
                break;
            default:
                $orderBy = 'name';
                $order = 'asc';
                break;
        }

        $show = request('show') ?? '5';
        $finishings = Finishing::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('finishings.index', [
            'page' => 'finishings',
            'finishings' => $finishings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('finishings.create', [
            'page' => 'finishings',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:finishing,name',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Finishing::create([
            'name' => $req['name'],
        ]);

        return redirect('/finishings?orderBy=newest')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $finishing = Finishing::find($id);

        if (!$finishing) {
            return back()->with('warning', 'Kategori tidak ditemukan');
        }

        return view('finishings.edit', [
            'page' => 'finishings',
            'finishing' => $finishing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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
