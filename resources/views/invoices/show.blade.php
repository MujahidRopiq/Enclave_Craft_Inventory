@extends('layouts.form')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Show Invoice</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">No. Invoice</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray text-capitalize">{{ $invoice->no_invoice }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Client</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray text-capitalize">{{ $invoice->consignee }}</div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">No. PO Buyer</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ $invoice->no_po_buyer }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Jumlah transaksi</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ count($invoice->stock_outs) }} <a
                                href="/stockouts?invoice={{ $invoice->no_invoice }}" class="btn btn-xs btn-primary">Lihat
                                riwayat transaksi</a></div>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Pelabuhan asal</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ $invoice->port_of_loading }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Pelabuhan tujuan</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ $invoice->port_of_destination }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Terms and Conditions</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ $invoice->terms_and_conditions }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="/invoices{{ str_replace('/invoices/' . $invoice->id, '', request()->getRequestUri()) }}"
                            class="btn btn-dark mr-1">Kemabli</a>
                        <a href="/invoices/{{ $invoice->id }}/edit{{ str_replace('/invoices/' . $invoice->id, '', request()->getRequestUri()) }}"
                            class="btn btn-primary mr-1">Ubah Detail</a>
                        <form
                            action="/invoices/{{ $invoice->id . str_replace('/invoices/' . $invoice->id, '', request()->getRequestUri()) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button
                                onclick="return confirm('PERHATIAN!!!\nSemua stok keluar yang bersangkutan dengan riwayat transaksi {{ $invoice->no_invoice }} juga akan dihapus!')"
                                type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>

            {{-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Invoice</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>
                                        Nama Invoice
                                        <span id="order-by-name" class="btn btn-xs btn-secondary">
                                            <i
                                                class="fas fa-solid fa-caret-{{ request('orderBy') == 'furniture_name' && request('order') == 'desc' ? 'up' : 'down' }}"></i>
                                        </span>
                                    </th>
                                    <th class="text-right">
                                        Tanggal Masuk
                                        <span id="order-by-date" class="btn btn-xs btn-secondary">
                                            <i
                                                class="fas fa-solid fa-caret-{{ request('orderBy') == 'created_at' && request('order') == 'desc' ? 'up' : 'down' }}"></i>
                                        </span>
                                    </th>
                                    <th class="text-right">Pemasok</th>
                                    <th class="text-right">Harga Satuan</th>
                                    <th class="text-right">Stok Masuk</th>
                                    <th class="text-right">Total Harga</th>
                                    <th class="text-right"><a href="/stockoutselects" class="btn btn-primary btn-sm"><i
                                                class="fas fa-solid fa-plus"></i> Tambah
                                            Stok</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock_outs as $data)
                                    <tr>
                                        <td class="text-uppercase">
                                            {{ $data->furniture_name }}
                                            <div class="text-gray text-sm">{{ $data->furniture_code }}</div>
                                        </td>
                                        <td class="text-right">{{ $data->created_at->format('d/m/Y') }}
                                        <td class="text-capitalize text-right">{{ $invoice->name }}</td>
                                        <td class="text-right">${{ number_format($data->furniture_price, 2) }}</td>
                                        <td class="text-right">{{ $data->amount }}</td>
                                        <td class="text-right">${{ number_format($data->total, 2) }}</td>
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm"
                                                href="/stockouts/{{ $data->id . str_replace('/stockouts', '', request()->getRequestUri()) }}">
                                                <i class="fas fa-folder"> </i>
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8">
                                            {{ $stock_outs->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="/invoices{{ str_replace('/invoices/' . $invoice->id, '', request()->getRequestUri()) }}"
                            class="btn btn-dark mr-1">Kemabli</a>
                        <a href="/invoices/{{ $invoice->id }}/edit{{ str_replace('/invoices/' . $invoice->id, '', request()->getRequestUri()) }}"
                            class="btn btn-primary mr-1">Ubah Detail</a>
                        <form
                            action="/invoices/{{ $invoice->id . str_replace('/invoices/' . $invoice->id, '', request()->getRequestUri()) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button
                                onclick="return confirm('PERHATIAN!!!\nSemua data riwayat transaksi {{ $invoice->name }} juga akan dihapus!')"
                                type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div> --}}

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
