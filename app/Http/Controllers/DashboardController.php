<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', [
            'page' => 'dashboard',
            'furnitures' => Furniture::all(),
            'suppliers' => Supplier::all(),
            'orders' => Order::all(),
            'invoices' => Invoice::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
