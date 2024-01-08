@extends('layouts.form')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah P.O</h1>
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
            <!-- Horizontal Form -->
            <form action="/purchaseorders" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card card-dark card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah P.O</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Supplier<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="supplier_id" id="supplier_id"
                                style="width: 100%;" required>
                                @foreach ($suppliers as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('supplier_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <small class="text-danger font-italic">{{ $message }}</small>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_po" class="col-sm-2 col-form-label">No. P.O</label>
                            <div class="col-sm-10">
                                <input type="number" name="no_po"
                                class="form-control @error('no_po') is-invalid @enderror" id="no_po"
                                    placeholder="No. P.O" value="{{ old('no_po') }}"autocomplete="off"
                                    min="0">
                                    @error('no_po')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_kirim" class="col-sm-2 col-form-label">Maks Tanggal Kirim</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal_kirim"
                                    class="form-control @error('tanggal_kirim') is-invalid @enderror" id="tanggal_kirim"
                                    placeholder="nomor telepon" value="{{ old('tanggal_kirim') }}"autocomplete="off"
                                    min="0">
                                @error('tanggal_kirim')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pemesan" class="col-sm-2 col-form-label">Pemberi Order</label>
                            <div class="col-sm-10">
                                <input type="text" name="pemesan"
                                    class="form-control @error('pemesan') is-invalid @enderror" id="pemesan"
                                    placeholder="Pemesan" value="{{ old('pemesan') }}"autocomplete="off">
                                @error('pemesan')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="/purchaseorders{{ str_replace('/purchaseorders/create', '', request()->getRequestUri()) }}"
                                class="btn btn-danger mr-1">Batal</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
