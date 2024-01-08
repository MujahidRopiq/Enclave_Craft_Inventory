<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'no_po';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? '5';
        $with = ['supplier'];
        $purchase_orders = PurchaseOrder::filter(request(['search', 'supplier']))->with($with)->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('purchase_orders.index', [
            'purchase_orders' => $purchase_orders,
            'suppliers' => Supplier::orderBy('name', 'asc')->get(),
        ]);
    }

    public function show($id)
    {
        $purchase_order = PurchaseOrder::find($id);

        $orderBy = request('orderBy') ?? 'furniture_name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? 5;
        $with = ['purchase_order'];
        $stock_ins = StockIn::filter(request(['search', 'purchase_order']))->with($with)->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        if (!$purchase_order) {
            return back()->with('warning', 'Data p.o tidak ditemukan!');
        }

        return view('purchase_orders.show', [
            'purchase_order' => $purchase_order,
            'stock_ins' => $stock_ins,
        ]);
    }

    public function create()
    {
        return view('purchase_orders.create', [
            'suppliers' => Supplier::orderBy('name', 'asc')->get(),
        ]);
    }

    public function store(Request $req)
    {
        /**
         * create fields
         */
        $fields = [
            'supplier_id' => $req['supplier_id'],
            'no_po' => $req['no_po'] ?? '-',
            'pemesan' => $req['pemesan'] ?? '-',
            'tanggal_kirim' => $req['tanggal_kirim'] ?? '-',
        ];

        /**
         * create rules validator
         */
        $rules = [
            'supplier_id' => 'required',
            'no_po' => 'required|unique:purchase_order,no_po',
            'pemesan' => 'required',
            'tanggal_kirim' => 'required',
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

        // PurchaseOrder::create($fields);

        PurchaseOrder::create([
            'supplier_id' => $fields['supplier_id'],
            'no_po' => $fields['no_po'],
            'pemesan' => $fields['pemesan'],
            'tanggal_kirim' => $fields['tanggal_kirim'],
        ]);

        return redirect('/purchaseorders?orderBy=created_at&order=desc')->with('success', 'Data p.o berhasil ditambahkan');
    }

    public function edit($id)
    {
        $with = ['supplier'];
        $purchase_order = PurchaseOrder::with($with)->find($id);

        if (!$purchase_order) {
            return back()->with('warning', 'Data p.o tidak ditemukan!');
        }

        return view('purchase_orders.edit', [
            'purchase_order' => $purchase_order
        ]);
    }

    public function update(Request $req, $id)
    {

        $purchase_order = PurchaseOrder::find($id);

        if (!$purchase_order) {
            return back()->with('warning', 'Data p.o tidak ditemukan!');
        }

        /**
         * create fields
         */
        $fields = [

            'no_po' => $req['no_po'] ?? $purchase_order['no_po'],
            'pemesan' => $req['pemesan'] ?? $purchase_order['pemesan'],
            'tanggal_kirim' => $req['tanggal_kirim'] ?? $purchase_order['tanggal_kirim'],

            // 'supplier_id' => $req['supplier_id'],
            // 'no_po' => $req['no_po'] ?? '-',
            // 'pemesan' => $req['pemesan'] ?? '-',
            // 'tanggal_kirim' => $req['tanggal_kirim'] ?? '-',
        ];

        /**
         * create rules validator
         */

        $rules = [
            'no_po' => 'required|unique:purchase_order,no_po',
            'pemesan' => 'required',
            'tanggal_kirim' => 'required',

            // 'supplier_id' => $req['supplier_id'],
            // 'no_po' => $req['no_po'] ?? '-',
            // 'pemesan' => $req['pemesan'] ?? '-',
            // 'tanggal_kirim' => $req['tanggal_kirim'] ?? '-',
        ];

        /**
         * update rules
         */
        if ($fields['no_po'] == $purchase_order->no_po) {
            $rules['no_po'] = 'required';
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

        $purchase_order->update($fields);

        $query = str_replace('/purchaseorders/' . $id, '', request()->getRequestUri());

        return redirect('/purchaseorders/' . $id . $query)->with('success', 'Data p.o berhasil diubah');
    }

    public function destroy($id)
    {
        $purchase_order = PurchaseOrder::find($id);

        if (!$purchase_order) {
            return back()->with('warning', 'Data p.o tidak ditemukan!');
        }

        $purchase_order->delete();

        $query = str_replace('/purchase_orders/' . $id, '', request()->getRequestUri());

        return redirect('/purchase_orders' . $query)->with('success', 'Data p.o berhasil dihapus');
    }
}
