@extends('layouts.table') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Stok Keluar</h1>
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

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card card-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Daftar Stok Keluar</h3>

                            <form action="/stockouts">
                                <div class="card-tools d-flex justify-content-end">

                                    <div class="mr-2 d-flex align-items-center">
                                        <label class="text-sm text-gray mr-1">Tampilkan</label>
                                        <div class="input-group input-group-sm" style="width: 60px">
                                            <input type="number" min="0" name="show"
                                                class="form-control float-right" placeholder="tampilkan"
                                                value="{{ request('show') ?? 5 }}" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="input-group input-group-sm mr-2" style="width: 150px">
                                        <select name="buyer" class="form-control">
                                            <option value="">Semua pembeli</option>
                                            @foreach ($invoices as $data)
                                                <option value="{{ $data->no_invoice }}"
                                                    {{ request('buyer') == $data->no_invoice ? 'selected' : '' }}>
                                                    {{ $data->no_invoice }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group input-group-sm" style="width: 200px">
                                        <input type="text" name="search" class="form-control float-right"
                                            placeholder="Cari nama/sku" value="{{ request('search') }}"
                                            autocomplete="off" />

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i> filter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->

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
                                            Tanggal Keluar
                                            <span id="order-by-date" class="btn btn-xs btn-secondary">
                                                <i
                                                    class="fas fa-solid fa-caret-{{ request('orderBy') == 'created_at' && request('order') == 'desc' ? 'up' : 'down' }}"></i>
                                            </span>
                                        </th>
                                        <th class="text-right">Invoice</th>
                                        <th class="text-right">Harga Satuan</th>
                                        <th class="text-right">Stok Keluar</th>
                                        <th class="text-right">Total Pendapatan</th>
                                        <th class="text-right"><a href="/stockoutselects" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-solid fa-plus"></i> Kurangi
                                                Stok</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stockouts as $data)
                                        <tr>
                                            <td class="text-uppercase">
                                                {{ $data->furniture_name }}
                                                <div class="text-gray text-sm">{{ $data->furniture_sku }}</div>
                                            </td>
                                            <td class="text-right">{{ $data->created_at->format('d/m/Y') }}
                                            <td class="text-capitalize text-right">{{ $data->invoice->no_invoice}}</td>
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
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8">
                                            {{ $stockouts->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>

    <form action="/stockouts" method="get" id="form-order-by-name">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="search" value="{{ request('no_invoice') ?? '' }}" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="orderBy" value="furniture_name" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <form action="/stockouts" method="get" id="form-order-by-date">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="search" value="{{ request('no_invoice') ?? '' }}" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="orderBy" value="created_at" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <script>
        const orderByName = document.querySelector("#order-by-name");
        const formOrderByName = document.querySelector("#form-order-by-name");

        const orderByDate = document.querySelector("#order-by-date");
        const formOrderByDate = document.querySelector("#form-order-by-date");

        orderByName.addEventListener("click", (e) => {
            e.preventDefault();

            formOrderByName.submit();
        });

        orderByDate.addEventListener("click", (e) => {
            e.preventDefault();

            formOrderByDate.submit();
        });
    </script>
@endsection
