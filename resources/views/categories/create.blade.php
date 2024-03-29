@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Kategori</h1>
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
            <form action="/categories" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card card-dark card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Kategori</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Kategori<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="nama"
                                    value="{{ old('name') }}" autofocus autocomplete="off" required>
                                @error('name')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">SKU<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" min="1" max="9" name="sku" class="form-control"
                                    id="sku" placeholder="nama" value="{{ old('sku') }}" autofocus
                                    autocomplete="off" required>
                                @error('sku')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="/categories" class="btn btn-danger mr-1">Batal</a>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
