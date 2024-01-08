@extends('layouts.table') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Riwayat P.O</h1>
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

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Riwayat P.O</h3>

                            <form action="/purchase_orders">
                                <div class="card-tools d-flex justify-content-end">
                                    <div class="mr-2 d-flex align-items-center">
                                        <label class="text-sm text-gray mr-1">Tampilkan</label>
                                        <div class="input-group input-group-sm" style="width: 60px">
                                            <input type="number" min="0" name="show"
                                                class="form-control float-right" placeholder="tampilkan"
                                                value="{{ request('show') ?? 5 }}" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="input-group input-group-sm" style="width: 300px">
                                        <input type="text" name="search" class="form-control float-right"
                                            placeholder="Cari No P.O/Tanggal Kirim" value="{{ request('search') }}"
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

                        {{-- <div class="card-header">

                        </div> --}}

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        {{-- <th colspan="2"></th> --}}
                                        <th>
                                            No. PO
                                            <span id="order-by-name" class="btn btn-xs btn-secondary">
                                                <i
                                                    class="fas fa-solid fa-caret-{{ request('orderBy') == 'no_po' && request('order') == 'desc' ? 'up' : 'down' }}"></i>
                                            </span>
                                        </th>
                                        <th class="text-right">
                                            Tanggal ditambahkan
                                            <span id="order-by-date" class="btn btn-xs btn-secondary">
                                                <i
                                                    class="fas fa-solid fa-caret-{{ request('orderBy') == 'created_at' && request('order') == 'desc' ? 'up' : 'down' }}"></i>
                                            </span>
                                        </th>
                                        <th class="text-right">Maks Tanggal Kirim</th>
                                        <th class="text-right">Pemesan</th>
                                        <th class="text-right"><a
                                                href="/purchaseorders/create{{ str_replace('/purchaseorders', '', request()->getRequestUri()) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-solid fa-plus"></i> Tambah
                                                P.O</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchase_orders as $data)
                                        <tr>
                                            <td>
                                                {{ $data->no_po }}
                                                {{-- <div class="text-sm text-gray">{{ $data->email }}</div> --}}
                                            </td>
                                            <td class="text-right">{{ $data->created_at->format('d/m/Y') }}</td>
                                            <td class="text-right">{{ $data->tanggal_kirim }}</td>
                                            <td class="text-right">{{ $data->pemesan }}</td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-primary btn-sm"
                                                    href="/purchaseorders/{{ $data->id }}{{ str_replace('/purchaseorders', '', request()->getRequestUri()) }}">
                                                    <i class="fas fa-folder"> </i>
                                                    Lihat
                                                </a>
                                                <a class="btn btn-info btn-sm"
                                                    href="/purchaseorders/{{ $data->id }}/edit{{ str_replace('/purchaseorders', '', request()->getRequestUri()) }}">
                                                    <i class="fas fa-pencil-alt"> </i>
                                                    Ubah
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            {{ $purchase_orders->links() }}
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

    <form action="/purchase_orders" method="get" id="form-order-by-name">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="orderBy" value="no_po" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <form action="/purchase_orders" method="get" id="form-order-by-date">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
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
