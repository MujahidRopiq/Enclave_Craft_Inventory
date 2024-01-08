@extends('layouts.table') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Stok Masuk</h1>
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
            <form action="/stockins" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dark card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Daftar Stok Masuk</h3>

                                <div class="card-tools d-flex justify-content-end">
                                    <a href="/stockinselects" class="btn btn-danger btn-sm mr-1"><i
                                            class="fas fa-solid fa-x"></i>
                                        Kembali</a>
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="fas fa-solid fa-angles-right"></i> Simpan</button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>
                                                Nama Furniture
                                            </th>
                                            <th class="text-right">Harga Satuan</th>
                                            <th class="" style="width: 300px">P.O</th>
                                            <th class="text-center" style="width: 150px">Stok Awal</th>
                                            <th class="text-center" style="width: 150px">Stok Masuk</th>
                                            <th class="text-center" style="width: 150px">Stok Akhir</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stockinselects as $data)
                                            <input type="hidden" name="furniture_id[]" value="{{ $data->furniture->id }}">
                                            <tr>
                                                <td class="text-uppercase">
                                                    <div class="d-flex">
                                                        <img src="{{ $data->furniture->furniture_images[0]->url }}"
                                                            alt="..." class="img-circle img-size-32" />
                                                        <div class="ml-2">
                                                            {{ $data->furniture->name }}
                                                            <div class="text-gray text-sm">{{ $data->furniture->code }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right" id="price_{{ $data->id }}">
                                                    ${{ number_format($data->furniture->price, 2) }}</td>
                                                <td class="">
                                                    <select class="form-control" name="purchase_order_id[]" id="purchase_order_id"
                                                        style="width: 100%;" required>
                                                        @foreach ($purchase_orders as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('purchase_order_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->no_po }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('purchase_order_id')
                                                        <small class="text-danger font-italic">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                                <td class="text-center" id="initial_stock_{{ $data->id }}">
                                                    {{ $data->furniture->stock }}
                                                </td>
                                                <td class="text-right">
                                                    <input type="number" min="0" name="amount[]"
                                                        class="form-control @error('amount') is-invalid @enderror"
                                                        id="amount_{{ $data->id }}" placeholder="stok masuk"
                                                        value="{{ old('amount') ?? 0 }}" autofocus autocomplete="off"
                                                        required>
                                                    @error('amount')
                                                        <small class="text-danger font-italic">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                                <td class="text-center" id="final_stock_{{ $data->id }}">
                                                    {{ $data->furniture->stock }}
                                                </td>
                                                <td class="text-center" id="total_{{ $data->id }}">
                                                    ${{ $data->furniture->stock * $data->furniture->price }}
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
            </form>
            <!-- /.row -->
        </div>
    </section>

    @foreach ($stockinselects as $data)
        <script>
            const initial_stock_{{ $data->id }} = document.querySelector('#initial_stock_{{ $data->id }}')
            const final_stock_{{ $data->id }} = document.querySelector('#final_stock_{{ $data->id }}')
            const amount_{{ $data->id }} = document.querySelector('#amount_{{ $data->id }}')
            const total_{{ $data->id }} = document.querySelector('#total_{{ $data->id }}')
            const price_{{ $data->id }} = document.querySelector('#price_{{ $data->id }}')

            amount_{{ $data->id }}.addEventListener('change', function(e) {

                e.preventDefault()

                final_stock_{{ $data->id }}.innerHTML = parseInt(amount_{{ $data->id }}.value ?? 0) +
                    parseInt(initial_stock_{{ $data->id }}.innerHTML)

                if (amount_{{ $data->id }}.value < 0) {
                    final_stock_{{ $data->id }}.innerHTML = parseInt(initial_stock_{{ $data->id }}.innerHTML)
                    amount_{{ $data->id }}.value = parseInt(0)
                }

                total_{{ $data->id }}.innerHTML = `$${(parseInt(amount_{{ $data->id }}
                        .value ?? 0) *
                    parseFloat(price_{{ $data->id }}.innerHTML.split('$').join(''))).toFixed(2)}`
            })

            amount_{{ $data->id }}.addEventListener('keyup', function(e) {
                e.preventDefault()

                final_stock_{{ $data->id }}.innerHTML = parseInt(amount_{{ $data->id }}.value ?? 0) +
                    parseInt(initial_stock_{{ $data->id }}.innerHTML)

                if (amount_{{ $data->id }}.value < 0) {
                    final_stock_{{ $data->id }}.innerHTML = parseInt(initial_stock_{{ $data->id }}.innerHTML)
                    amount_{{ $data->id }}.value = parseInt(0)
                }

                total_{{ $data->id }}.innerHTML = `$${(parseInt(amount_{{ $data->id }}
                        .value ?? 0) *
                    parseFloat(price_{{ $data->id }}.innerHTML.split('$').join(''))).toFixed(2)}`
            })
        </script>
    @endforeach
@endsection
