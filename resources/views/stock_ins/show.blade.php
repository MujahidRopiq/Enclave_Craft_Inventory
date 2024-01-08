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

            <div class="row">
                <div class="col-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            <h3 class="profile-username text-center">{{ $stockin->furniture_name }}</h3>

                            <p class="text-muted text-center">{{ $stockin->furniture_code }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Kode seri</b> <a class="float-right text-gray">{{ $stockin->code }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>No P.O</b> <a class="float-right text-gray">{{ $stockin->purchase_order->no_po }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Stok awal</b> <a class="float-right text-gray">{{ $stockin->initial_stock }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Stok masuk</b> <a class="float-right text-gray">{{ $stockin->amount }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Stok akhir</b> <a class="float-right text-gray">{{ $stockin->final_stock }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tanggal masuk</b> <a class="float-right text-gray">{{ $stockin->created_at }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Harga satuan</b> <a
                                        class="float-right text-gray">${{ number_format($stockin->furniture_price, 2) }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total harga</b> <a
                                        class="float-right text-gray">${{ number_format($stockin->total, 2) }}</a>
                                </li>
                            </ul>

                            <div class="d-flex justify-content-end">
                                <a href="/stockins{{ str_replace('/stockins/' . $stockin->id, '', request()->getRequestUri()) }}"
                                    class="btn btn-dark">Kembali</a>
                                <form
                                    action="/stockins/{{ $stockin->id . str_replace('/stockins/' . $stockin->id, '', request()->getRequestUri()) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button
                                        onclick="return confirm('PERHATIAN!!!\nData riwayat stok masuk akan dihapus secara permanen!')"
                                        type="submit" class="btn btn-danger mx-1">Hapus</button>
                                </form>
                                <a href="#" class="btn btn-primary">Print</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
@endsection
