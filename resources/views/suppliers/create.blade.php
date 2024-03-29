@extends('layouts.form')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Supplier</h1>
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
            <form action="/suppliers" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card card-dark card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama lengkap<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="nama lengkap" value="{{ old('name') }}" autofocus autocomplete="off"
                                    required>
                                @error('name')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Perusahaan<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="perusahaan" class="form-control"
                                    id="sku" placeholder="e.g Enclave Craft" value="{{ old('perusahaan') }}" autofocus
                                    autocomplete="off" required>
                                @error('sku')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Alamat<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" class="form-control"
                                    id="sku" placeholder="e.g Kentingan, Jl. Ir Sutami No.36, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126" value="{{ old('alamat') }}" autofocus
                                    autocomplete="off" required>
                                @error('sku')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nomor Telepon<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="telepon" class="form-control"
                                    id="sku" placeholder="e.g (0271) 646994" value="{{ old('telepon') }}" autofocus
                                    autocomplete="off" required>
                                @error('sku')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Spesialisasi<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="spesialisasi" class="form-control"
                                    id="sku" placeholder="e.g Serba bisa" value="{{ old('spesialisasi') }}" autofocus
                                    autocomplete="off" required>
                                @error('sku')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="/suppliers{{ str_replace('/suppliers/create', '', request()->getRequestUri()) }}"
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
