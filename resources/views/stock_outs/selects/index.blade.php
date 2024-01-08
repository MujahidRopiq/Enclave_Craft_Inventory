@extends('layouts.table') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pilih Furniture</h1>
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
                            <h3 class="card-title">Tabel Daftar Furniture</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            Nama
                                        </th>
                                        <th class="text-right">
                                            Tanggal ditambahkan
                                        </th>
                                        <th class="text-right">Kategori</th>
                                        <th class="text-right">Stok</th>
                                        <th class="text-right">Harga Satuan</th>
                                        <th class="text-right">
                                            <div class="d-flex justify-content-end">
                                                <form action="/stockoutselects/cancel" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm mr-1"><i
                                                            class="fas fa-solid fa-x"></i> Batal</button>
                                                </form>
                                                <a href="/stockouts/create" class="btn btn-primary btn-sm"><i
                                                        class="fas fa-solid fa-angles-right"></i> Lanjut</a>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stockoutselects as $data)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <img src="{{ $data->furniture->furniture_images[0]->url }}"
                                                        alt="..." class="img-circle img-size-32" />
                                                    <div class="text-capitalize ml-3">
                                                        {{ $data->furniture->name }}
                                                        <div class="text-sm text-gray">{{ $data->furniture->sku }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">{{ $data->furniture->created_at->format('d/m/Y') }}</td>
                                            <td class="text-right">{{ $data->furniture->category->name }}</td>
                                            <td class="text-right">{{ $data->furniture->stock }}</td>
                                            <td class="text-right">${{ number_format($data->furniture->price, 2) }}</td>
                                            <td class="project-actions text-right">
                                                <form action="/stockoutselects/{{ $data->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="furniture_id"
                                                        value="{{ $data->furniture->id }}">
                                                    <button class="btn btn-outline-danger btn-sm" type="submit">
                                                        <i class="fas fa-folder"> </i>
                                                        Keluarkan
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-12">
                    <div class="card card-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Daftar Furniture</h3>

                            <form action="/stockoutselects">
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

                                    {{-- <div class="input-group input-group-sm mr-2" style="width: 150px">
                                        <select name="material" class="form-control">
                                            <option value="">Semua material</option>
                                            @foreach ($materials as $data)
                                                <option value="{{ $data->name }}"
                                                    {{ request('material') == $data->name ? 'selected' : '' }}>
                                                    {{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div> --}}

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

                        {{-- <div class="card-header">

                        </div> --}}

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
                                        <th class="text-right">Stok</th>
                                        <th class="text-right">Harga Satuan</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($furnitures as $data)
                                        <tr class="{{ $data->stock_out_select ? 'd-none' : '' }}">
                                            <td>
                                                <div class="d-flex">
                                                    <img src="{{ $data->furniture_images[0]->url }}" alt="..."
                                                        class="img-circle img-size-32" />
                                                    <div class="text-capitalize ml-3">
                                                        {{ $data->name }}
                                                        <div class="text-sm text-gray">{{ $data->sku }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">{{ $data->created_at->format('d/m/Y') }}</td>
                                            <td class="text-right">{{ $data->category->name }}</td>
                                            <td class="text-right">{{ $data->stock }}</td>
                                            <td class="text-right">${{ number_format($data->price, 2) }}</td>
                                            <td class="project-actions text-right">
                                                <form action="/stockoutselects" method="post">
                                                    @csrf
                                                    <input type="hidden" name="furniture_id"
                                                        value="{{ $data->id }}">
                                                    <button class="btn btn-outline-primary btn-sm" type="submit">
                                                        <i class="fas fa-folder"> </i>
                                                        Pilih
                                                    </button>
                                                </form>
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

    <form action="/stockoutselects" method="get" id="form-order-by-name">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="category" value="{{ request('category') ?? '' }}" />
        <input type="hidden" name="material" value="{{ request('material') ?? '' }}" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="orderBy" value="name" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <form action="/stockoutselects" method="get" id="form-order-by-date">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="category" value="{{ request('category') ?? '' }}" />
        <input type="hidden" name="material" value="{{ request('material') ?? '' }}" />
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
