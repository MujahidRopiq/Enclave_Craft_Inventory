@extends('layouts.table') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Furniture</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="/furnitures/create{{ str_replace('/furnitures', '', request()->getRequestUri()) }}"
                        class="btn btn-primary">Tambah Furniture</a>
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
                            <form action="/furnitures">
                                <div class="d-flex justify-content-end">
                                    <div class="mr-2 d-flex">
                                        <label class="text-sm text-gray mr-1">Tampilkan</label>
                                        <div class="input-group input-group-sm" style="width: 60px">
                                            <input type="number" min="0" name="show"
                                                class="form-control float-right" placeholder="tampilkan"
                                                value="{{ request('show') ?? 5 }}" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="input-group input-group-sm mr-2" style="width: 150px">
                                        <select name="category" class="form-control">
                                            <option value="">Semua
                                                kategori
                                            </option>
                                            @foreach ($categories as $data)
                                                <option value="{{ $data->name }}"
                                                    {{ request('category') == $data->name ? 'selected' : '' }}>
                                                    {{ $data->name }}
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
                                        {{-- <th colspan="2"></th> --}}
                                        <th>
                                            Nama
                                            <span id="order-by-name" class="btn btn-xs btn-secondary">
                                                <i
                                                    class="fas fa-solid fa-caret-{{ request('orderBy') == 'name' && request('order') == 'desc' ? 'up' : 'down' }}"></i>
                                            </span>
                                        </th>
                                        <th class="text-right">
                                            Tanggal ditambahkan
                                            <span id="order-by-date" class="btn btn-xs btn-secondary">
                                                <i
                                                    class="fas fa-solid fa-caret-{{ request('orderBy') == 'created_at' && request('order') == 'desc' ? 'up' : 'down' }}"></i>
                                            </span>
                                        </th>
                                        <th class="text-right">Kategori</th>
                                        <th class="text-right">Ukuran</th>
                                        <th class="text-right">Stok</th>
                                        <th class="text-right">Harga Satuan</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($furnitures as $data)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="rounded-lg"
                                                        style="background-position: center;background-size: cover; background-image: url({{ $data->furniture_images[0]->url }}); width: 32px; height: 32px" />
                                                </div>
                                                <div class="ml-2">
                                                    {{ $data->name }}
                                                    <div class="text-sm text-gray">{{ $data->sku }}</div>
                                                </div>
                        </div>
                        </td>
                        <td class="text-right">{{ $data->created_at->format('d/m/Y') }}</td>
                        <td class="text-right">{{ $data->category->name }}</td>
                        <td class="text-right">{{ $data->size }}</td>
                        <td class="text-right">{{ $data->stock }}</td>
                        <td class="text-right">${{ number_format($data->price, 2) }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm"
                                href="/furnitures/{{ $data->id }}{{ str_replace('/furnitures', '', request()->getRequestUri()) }}">
                                Lihat
                            </a>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    {{ $furnitures->links() }}
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

    <form action="/furnitures" method="get" id="form-order-by-name">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="category" value="{{ request('category') ?? '' }}" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="orderBy" value="name" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <form action="/furnitures" method="get" id="form-order-by-date">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="category" value="{{ request('category') ?? '' }}" />
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
