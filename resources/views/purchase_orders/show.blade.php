@extends('layouts.form')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show P.O</h1>
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
                    <h3 class="card-title">Form Show P.O</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Supplier</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray text-capitalize">{{ $purchase_order->supplier->name }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">No. PO</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray text-capitalize">{{ $purchase_order->no_po }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Maks Tanggal Kirim</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ $purchase_order->tanggal_kirim }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Pemesan</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ $purchase_order->pemesan }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Jumlah transaksi</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ count($purchase_order->stock_ins) }} <a
                                    href="/stockins?purchaseorder={{ $purchase_order->no_po }}" class="btn btn-xs btn-primary">Lihat
                                    riwayat transaksi</a></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="/purchaseorders{{ str_replace('/purchaseorders/' . $purchase_order->id, '', request()->getRequestUri()) }}"
                            class="btn btn-dark mr-1">Kemabli</a>
                        <a href="/purchaseorders/{{ $purchase_order->id }}/edit{{ str_replace('/purchaseorders/' . $purchase_order->id, '', request()->getRequestUri()) }}"
                            class="btn btn-primary mr-1">Ubah Detail</a>
                        <form
                            action="/purchaseorders/{{ $purchase_order->id . str_replace('/purchaseorders/' . $purchase_order->id, '', request()->getRequestUri()) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button
                                onclick="return confirm('PERHATIAN!!!\nSemua data riwayat transaksi {{ $purchase_order->name }} juga akan dihapus!')"
                                type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>

            {{-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Furniture</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>
                                        Nama Furniture
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
                                    <th class="text-right"><a href="/stockinselects" class="btn btn-primary btn-sm"><i
                                                class="fas fa-solid fa-plus"></i> Tambah
                                            Stok</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock_ins as $data)
                                    <tr>
                                        <td class="text-uppercase">
                                            {{ $data->furniture_name }}
                                            <div class="text-gray text-sm">{{ $data->furniture_code }}</div>
                                        </td>
                                        <td class="text-right">{{ $data->created_at->format('d/m/Y') }}
                                        <td class="text-capitalize text-right">{{ $purchase_order->name }}</td>
                                        <td class="text-right">${{ number_format($data->furniture_price, 2) }}</td>
                                        <td class="text-right">{{ $data->amount }}</td>
                                        <td class="text-right">${{ number_format($data->total, 2) }}</td>
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm"
                                                href="/stockins/{{ $data->id . str_replace('/stockins', '', request()->getRequestUri()) }}">
                                                <i class="fas fa-folder"> </i>
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8">
                                            {{ $stock_ins->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="/purchase_orders{{ str_replace('/purchase_orders/' . $purchase_order->id, '', request()->getRequestUri()) }}"
                            class="btn btn-dark mr-1">Kemabli</a>
                        <a href="/purchase_orders/{{ $purchase_order->id }}/edit{{ str_replace('/purchase_orders/' . $purchase_order->id, '', request()->getRequestUri()) }}"
                            class="btn btn-primary mr-1">Ubah Detail</a>
                        <form
                            action="/purchase_orders/{{ $purchase_order->id . str_replace('/purchase_orders/' . $purchase_order->id, '', request()->getRequestUri()) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button
                                onclick="return confirm('PERHATIAN!!!\nSemua data riwayat transaksi {{ $purchase_order->name }} juga akan dihapus!')"
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
