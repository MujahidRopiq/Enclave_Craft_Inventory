@extends('layouts.form')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Supplier</h1>
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
                    <h3 class="card-title">Form Edit Supplier</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray text-capitalize">{{ $supplier->name }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray text-capitalize">{{ $supplier->telepon }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Eamil</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ $supplier->perusahaan }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ $supplier->alamat }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">spesialisasi</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ $supplier->spesialisasi }}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Jumlah transaksi</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="text-gray">{{ count($supplier->purchase_orders) }} <a
                                    href="/purchaseorders?supplier={{ $supplier->name }}" class="btn btn-xs btn-primary">Lihat
                                    riwayat transaksi</a></div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="/suppliers{{ str_replace('/suppliers/' . $supplier->id, '', request()->getRequestUri()) }}"
                            class="btn btn-dark mr-1">Kemabli</a>
                        <a href="/suppliers/{{ $supplier->id }}/edit{{ str_replace('/suppliers/' . $supplier->id, '', request()->getRequestUri()) }}"
                            class="btn btn-primary mr-1">Ubah Detail</a>
                        <form
                            action="/suppliers/{{ $supplier->id . str_replace('/suppliers/' . $supplier->id, '', request()->getRequestUri()) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button
                                onclick="return confirm('PERHATIAN!!!\nSemua data riwayat transaksi {{ $supplier->name }} juga akan dihapus!')"
                                type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>

            {{-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Supplier</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>
                                        Nama Supplier
                                        <span id="order-by-name" class="btn btn-xs btn-secondary">
                                            <i
                                                class="fas fa-solid fa-caret-{{ request('orderBy') == 'Supplier_name' && request('order') == 'desc' ? 'up' : 'down' }}"></i>
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
                                            {{ $data->Supplier_name }}
                                            <div class="text-gray text-sm">{{ $data->Supplier_code }}</div>
                                        </td>
                                        <td class="text-right">{{ $data->created_at->format('d/m/Y') }}
                                        <td class="text-capitalize text-right">{{ $supplier->name }}</td>
                                        <td class="text-right">${{ number_format($data->Supplier_price, 2) }}</td>
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
                        <a href="/suppliers{{ str_replace('/suppliers/' . $supplier->id, '', request()->getRequestUri()) }}"
                            class="btn btn-dark mr-1">Kemabli</a>
                        <a href="/suppliers/{{ $supplier->id }}/edit{{ str_replace('/suppliers/' . $supplier->id, '', request()->getRequestUri()) }}"
                            class="btn btn-primary mr-1">Ubah Detail</a>
                        <form
                            action="/suppliers/{{ $supplier->id . str_replace('/suppliers/' . $supplier->id, '', request()->getRequestUri()) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button
                                onclick="return confirm('PERHATIAN!!!\nSemua data riwayat transaksi {{ $supplier->name }} juga akan dihapus!')"
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
