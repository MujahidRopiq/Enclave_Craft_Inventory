<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\Invoice;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'no_invoice';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? '5';
        $invoices = Invoice::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('invoices.index', [
            'invoices' => $invoices,

        ]);
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);

        $orderBy = request('orderBy') ?? 'furniture_name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? 5;
        $with = ['invoice'];
        $stock_outs = StockOut::filter(request(['search', 'invoice']))->with($with)->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        if (!$invoice) {
            return back()->with('warning', 'Data invoice tidak ditemukan!');
        }

        return view('invoices.show', [
            'invoice' => $invoice,
            'stock_outs' => $stock_outs,
        ]);
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $req)
    {
        /**
         * create fields
         */
        $fields = [
            'no_invoice' => $req['no_invoice'] ?? 0000,
            'consignee' => $req['consignee']?? '-',
            'no_po_buyer' => $req['no_po_buyer'] ?? 0,
            'port_of_loading' => $req['port_of_loading']?? '-',
            'port_of_destination' => $req['port_of_destination']?? '-',
            'terms_and_conditions' => $req['terms_and_conditions'] ?? '-',
            // 'phone' => $req['phone'] ?? 0,
            // 'address' => $req['address'] ?? '-',
        ];

        /**
         * create rules validator
         */
        $rules = [
            'no_invoice' => 'required|unique:invoice,no_invoice',
            'consignee' => 'required',
            'no_po_buyer' => 'required',
            'port_of_loading' => 'required',
            'port_of_destination' => 'required',
            'terms_and_conditions' => 'required',
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

        Invoice::create($fields);

        return redirect('/invoices?orderBy=created_at&order=desc')->with('success', 'Data invoice berhasil ditambahkan');
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return back()->with('warning', 'Data invoice tidak ditemukan!');
        }

        return view('invoices.edit', [
            'invoice' => $invoice
        ]);
    }

    public function update(Request $req, $id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return back()->with('warning', 'Data invoice tidak ditemukan!');
        }

        /**
         * create fields
         */
        $fields = [
            'no_invoice' => $req['no_invoice'] ?? $invoice['no_invoice'],
            'consignee' => $req['consignee'] ?? $invoice['consignee'],
            'no_po_buyer' => $req['no_po_buyer'] ?? $invoice['no_po_buyer'],
            'port_of_loading' => $req['port_of_loading'] ?? $invoice['port_of_loading'],
            'port_of_destination' => $req['port_of_destination'] ?? $invoice['port_of_destination'],
            'terms_and_conditions' => $req['terms_and_conditions'] ?? $invoice['terms_and_conditions'],
        ];

        /**
         * create rules validator
         */
        $rules = [
            'no_invoice' => 'required|unique:invoice,no_invoice',
            'consignee' => 'required',
            'no_po_buyer' => 'required',
            'port_of_loading' => 'required',
            'port_of_destination' => 'required',
            'terms_and_conditions' => 'required',
        ];

        /**
         * update rules
         */
        if ($fields['no_invoice'] == $invoice->name) {
            $rules['no_invoice'] = 'required';
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

        $invoice->update($fields);

        $query = str_replace('/invoices/' . $id, '', request()->getRequestUri());

        return redirect('/invoices/' . $id . $query)->with('success', 'Data invoice berhasil diubah');
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return back()->with('warning', 'Data invoice tidak ditemukan!');
        }

        $invoice->delete();

        $query = str_replace('/invoices/' . $id, '', request()->getRequestUri());

        return redirect('/invoices' . $query)->with('success', 'Data invoice berhasil dihapus');
    }
}
