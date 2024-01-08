@extends('layouts.form')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Supplier</h1>
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
            <form
                action="/suppliers/{{ $supplier->id }}{{ str_replace('/suppliers/' . $supplier->id . '/edit', '', request()->getRequestUri()) }}"
                method="post" class="form-horizontal">
                @csrf
                @method('put')
                <div class="card card-dark card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama lengkap<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="nama lengkap" value="{{ $supplier->name }}" autofocus autocomplete="off"
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
                                <input type="text" name="perusahaan" class="form-control" id="name" placeholder="e.g Enclave Craft"
                                    value="{{ $supplier->perusahaan }}" autofocus autocomplete="off" required>
                                @error('name')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Alamat<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" class="form-control" id="name" placeholder="e.g Kentingan, Jl. Ir Sutami No.36, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126"
                                    value="{{ $supplier->alamat }}" autofocus autocomplete="off" required>
                                @error('name')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nomor Telepon<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="telepon" class="form-control" id="name" placeholder="e.g (0271) 646994"
                                    value="{{ $supplier->telepon }}" autofocus autocomplete="off" required>
                                @error('name')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Spesialisasi<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="spesialisasi" class="form-control" id="name" placeholder="e.g Serba bisa"
                                    value="{{ $supplier->spesialisasi }}" autofocus autocomplete="off" required>
                                @error('name')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="/suppliers/{{ $supplier->id . str_replace('/suppliers/' . $supplier->id . '/edit', '', request()->getRequestUri()) }}"
                                class="btn btn-danger mr-1">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
