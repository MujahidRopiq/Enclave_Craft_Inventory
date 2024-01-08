@extends('layouts.table') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Material 3</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="/material3s/create" class="btn btn-primary">Tambah
                        Material 3</a>
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
                            <form action="/material3s">
                                <div class="card-tools d-flex justify-content-end">
                                    <div class="mr-2 d-flex">
                                        <label class="text-sm text-gray mr-1">Tampilkan</label>
                                        <div class="input-group input-group-sm" style="width: 60px">
                                            <input type="number" min="0" name="show"
                                                class="form-control float-right" placeholder="tampilkan"
                                                value="{{ request('show') ?? 5 }}" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 200px">
                                        <input type="text" name="search" class="form-control float-right"
                                            placeholder="Cari nama" value="{{ request('search') }}" autocomplete="off" />

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
                                            Nama
                                            <span id="order-by-name" class="btn btn-xs btn-secondary"><i
                                                    class="fas fa-solid fa-caret-{{ request('orderBy') == 'name' && request('order') == 'desc' ? 'up' : 'down' }}"></i></span>
                                        </th>
                                        <th class="text-right">SKU <span id="order-by-sku"
                                                class="btn btn-xs btn-secondary"><i
                                                    class="fas fa-solid fa-caret-{{ request('orderBy') == 'sku' && request('order') == 'desc' ? 'up' : 'down' }}"></i></span>
                                        </th>
                                        <th class="text-right">Jumlah furniture</th>
                                        <th class="text-right">Tanggal ditambahkan <span id="order-by-date"
                                                class="btn btn-xs btn-secondary"><i
                                                    class="fas fa-solid fa-caret-{{ request('orderBy') == 'created_at' && request('order') == 'desc' ? 'up' : 'down' }}"></i></span>
                                        </th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($material3s as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td class="text-right">{{ $data->sku }}</td>
                                            <td class="text-right">{{ count($data->furnitures) }}</td>
                                            <td class="text-right">{{ $data->created_at->format('d/m/Y') }}</td>
                                            <td class="project-actions text-right">
                                                <div class="d-flex justify-content-end">
                                                    <a class="btn btn-info btn-sm mr-1"
                                                        href="/material3s/{{ $data->id }}/edit{{ str_replace('/material3s', '', request()->getRequestUri()) }}">
                                                        <i class="fas fa-pencil-alt"> </i>
                                                        Ubah
                                                    </a>
                                                    <form
                                                        action="/material3s/{{ $data->id . str_replace('/material3s', '', request()->getRequestUri()) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button
                                                            onclick="return confirm('PERHATIAN!!!\nSemua furniture yang menggunakan material 3 {{ $data->name }} juga akan terhapus.')"
                                                            type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            {{ $material3s->links() }}
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

    <form action="/material3s" method="get" id="form-order-by-name">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="orderBy" value="name" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <form action="/material3s" method="get" id="form-order-by-sku">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="orderBy" value="sku" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <form action="/material3s" method="get" id="form-order-by-date">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="orderBy" value="created_at" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <script>
        const orderByName = document.querySelector("#order-by-name");
        const formOrderByName = document.querySelector("#form-order-by-name");

        const orderByDate = document.querySelector("#order-by-date");
        const formOrderByDate = document.querySelector("#form-order-by-date");

        const orderBySku = document.querySelector("#order-by-sku");
        const formOrderBySku = document.querySelector("#form-order-by-sku");

        orderByName.addEventListener("click", (e) => {
            e.preventDefault();

            formOrderByName.submit();
        });

        orderByDate.addEventListener("click", (e) => {
            e.preventDefault();

            formOrderByDate.submit();
        });

        orderBySku.addEventListener("click", (e) => {
            e.preventDefault();

            formOrderBySku.submit();
        });
    </script>
@endsection
