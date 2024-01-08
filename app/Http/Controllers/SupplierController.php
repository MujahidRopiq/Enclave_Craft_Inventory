<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? '5';
        $suppliers = Supplier::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('suppliers.index', [
            'suppliers' => $suppliers,

        ]);
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);

        $orderBy = request('orderBy') ?? 'no_po';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? 5;
        $with = ['supplier'];
        $purchase_orders = PurchaseOrder::filter(request(['search', 'supplier']))->with($with)->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        if (!$supplier) {
            return back()->with('warning', 'Data pemasok tidak ditemukan!');
        }

        return view('suppliers.show', [
            'supplier' => $supplier,
            'purchase_orders' => $purchase_orders,
        ]);
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $req)
    {
        /**
         * create fields
         */
        $fields = [
            'name' => $req['name'],
            'perusahaan' => $req['perusahaan'] ?? '-',
            'alamat' => $req['alamat']  ?? '-',
            'telepon' => $req['telepon']  ?? 0,
            'spesialisasi' => $req['spesialisasi'] ?? '-',
        ];

        /**
         * create rules validator
         */
        $rules = [
            'name' => 'required|min:3|unique:supplier,name',
            'perusahaan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'spesialisasi' => 'required',
        ];

        /**
         * run validator
         */
        $validator = Validator::make($fields, $rules);

        /**
         * run validator
         */
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Supplier::create($fields);

        return redirect('/suppliers?orderBy=created_at&order=desc')->with('success', 'Data pemasok berhasil ditambahkan');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return back()->with('warning', 'Data pemasok tidak ditemukan!');
        }

        return view('suppliers.edit', [
            'supplier' => $supplier
        ]);
    }

    public function update(Request $req, $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return back()->with('warning', 'Data pemasok tidak ditemukan!');
        }

        /**
         * create fields
         */
        $fields = [
            'name' => $req['name'] ?? $supplier['name'],
            'perusahaan' => $req['perusahaan'] ?? $supplier['perusahaan'],
            'alamat' => $req['alamat'] ?? $supplier['alamat'],
            'telepon' => $req['telepon'] ?? $supplier['telepon'],
            'spesialisasi' => $req['spesialisasi'] ?? $supplier['spesialisasi'],
        ];

        /**
         * create rules validator
         */
        $rules = [
            'name' => 'required|min:3|unique:supplier,name',
            'perusahaan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'spesialisasi' => 'required',
        ];

        /**
         * update rules
         */
        if ($fields['name'] == $supplier->name) {
            $rules['name'] = 'required|min:3';
        }

        /**
         * run validator
         */
        $validator = Validator::make($fields, $rules);

        /**
         * run validator
         */
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $supplier->update($fields);

        $query = str_replace('/suppliers/' . $id, '', request()->getRequestUri());

        return redirect('/suppliers/' . $id . $query)->with('success', 'Data pemasok berhasil diubah');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return back()->with('warning', 'Data pemasok tidak ditemukan!');
        }

        $supplier->delete();

        $query = str_replace('/suppliers/' . $id, '', request()->getRequestUri());

        return redirect('/suppliers' . $query)->with('success', 'Data pemasok berhasil dihapus');
    }
}
