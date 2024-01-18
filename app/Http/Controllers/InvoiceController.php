<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceFurniture;
use App\Models\InvoiceSelect;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderBy = 'created_at';
        $order = 'desc';

        switch (request('orderBy')) {
            case 'newest':
                $orderBy = 'created_at';
                $order = 'desc';
                break;
            case 'oldest':
                $orderBy = 'created_at';
                $order = 'asc';
                break;
            default:
                $orderBy = 'created_at';
                $order = 'desc';
                break;
        }

        $show = request('show') ?? '5';
        $with = ['invoice_furnitures'];
        $invoices = Invoice::filter(request(['search', 'status']))->with($with)->orderBy($orderBy, $order)->paginate($show)->withQueryString();
        InvoiceSelect::truncate();

        return view('invoices.index', [
            'page' => 'invoices',
            'invoices' => $invoices,
            'allInvoices' => Invoice::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.create', [
            'page' => 'invoices',
            'invoice_selects' => InvoiceSelect::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        /**
         * create fields
         */
        $fields = [
            'furniture_id' => $req['furniture_id'],
            'no_invoice' => $req['no_invoice'] ?? 'xxxxx',
            'consignee' => $req['consignee']?? '-',
            'detail_consignee' => $req['detail_consignee']?? '-',
            'no_po_buyer' => $req['no_po_buyer'] ?? 0,
            'port_of_loading' => $req['port_of_loading']?? '-',
            'port_of_destination' => $req['port_of_destination']?? '-',
            'terms_and_conditions' => $req['terms_and_conditions'] ?? '-',
            // 'deadline' => $req['deadline'],
            'qty' => $req['qty'],
            'price' => $req['price'],
            'total' => $req['total'] ?? 0,
        ];

        /**
         * create rules validator
         */
        $rules = [
            'no_invoice' => 'required',
            'consignee' => 'required',
            'detail_consignee' => 'required',
            'no_po_buyer' => 'required',
            'port_of_loading' => 'required',
            'port_of_destination' => 'required',
            'terms_and_conditions' => 'required',
            // 'deadline' => 'required',
        ];

        $validator = Validator::make($fields, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Invoice::create([
            'no_invoice' => $fields['no_invoice'],
            'consignee' => $fields['consignee'],
            'detail_consignee' => $fields['detail_consignee'],
            'no_po_buyer' => $fields['no_po_buyer'],
            'port_of_loading' => $fields['port_of_loading'],
            'port_of_destination' => $fields['port_of_destination'],
            'terms_and_conditions' => $fields['terms_and_conditions'],
            // 'deadline' => $fields['deadline'],
        ]);

        $invoice_id = Invoice::orderBy('created_at', 'desc')->first()->id;
        $fields['invoice_id'] = $invoice_id;

        foreach ($fields['furniture_id'] as $i => $data) {
            $rules = [
                'invoice_id' => 'required',
                'furniture_id' => 'required',
                'qty' => 'required',
                'price' => 'required',
                'total' => 'required',
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

            InvoiceFurniture::create([
                'invoice_id' => $fields['invoice_id'],
                'furniture_id' => $data,
                'qty' => $fields['qty'][$i],
                'price' => $fields['price'][$i],
                'total' => sprintf('%.2f', $fields['qty'][$i] * $fields['price'][$i])
            ]);
        }

        InvoiceSelect::truncate();

        return redirect('/invoices?orderBy=newest')->with('success', 'Invoice berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $with = ['invoice_furnitures'];
        $invoice = Invoice::with($with)->find($id);

        if (!$invoice) {
            return back()->with('warning', 'Invoice not found!');
        }

        return view('invoices.show', [
            'page' => 'invoices',
            'invoice' => $invoice,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return back()->with('warning', 'Invoice tidak ditemukan!');
        }

        /**
         * create fields
         */
        $fields = [
            'status' => $req['status'] ?? $invoice['status'],
        ];

        /**
         * create rules validator
         */
        $rules = [
            'status' => 'required',
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

        $invoice->update($fields);

        return back()->with('success', 'Status berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return back()->with('warning', 'Invoice tidak ditemukan!');
        }

        $invoice_furnitures = InvoiceFurniture::where('invoice_id', $id);

        $invoice->delete();
        $invoice_furnitures->delete();

        $query = str_replace('/invoices/' . $id, '', request()->getRequestUri());

        return redirect('/invoices' . $query)->with('success', 'Invoice berhasil dihapus');
    }
}
