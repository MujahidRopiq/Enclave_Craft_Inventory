@extends('layouts.form')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Invoice</h1>
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
            <form action="/invoices" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card card-dark card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Invoice</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="consignee" class="col-sm-2 col-form-label">Consignee</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('consignee') is-invalid @enderror" rows="3" name="consignee"
                                id="consignee" placeholder="Client...">{{ old('consignee') }}</textarea>
                                @error('consignee')
                                <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_invoice" class="col-sm-2 col-form-label">No. Invoice</label>
                            <div class="col-sm-10">
                                <input type="number" name="no_invoice"
                                class="form-control @error('no_invoice') is-invalid @enderror" id="no_invoice"
                                    placeholder="No. Invoice" value="{{ old('no_invoice') }}"autocomplete="off"
                                    min="0">
                                    @error('no_invoice')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="terms_and_conditions" class="col-sm-2 col-form-label">Terms and Conditions</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('terms_and_conditions') is-invalid @enderror" rows="3" name="terms_and_conditions"
                                id="terms_and_conditions" placeholder="Terms and Conditions...">{{ old('terms_and_conditions') }}</textarea>
                                @error('terms_and_conditions')
                                <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_po_buyer" class="col-sm-2 col-form-label">No. PO Buyer</label>
                            <div class="col-sm-10">
                                <input type="number" name="no_po_buyer"
                                class="form-control @error('no_po_buyer') is-invalid @enderror" id="no_po_buyer"
                                    placeholder="No. Po Buyer" value="{{ old('no_po_buyer') }}"autocomplete="off"
                                    min="0">
                                    @error('no_po_buyer')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="port_of_loading" class="col-sm-2 col-form-label">Port of Loading<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="port_of_loading"
                                    class="form-control @error('port_of_loading') is-invalid @enderror" id="port_of_loading"
                                    placeholder="Port of Loading" value="{{ old('port_of_loading') }}" autofocus autocomplete="off"
                                    required>
                                @error('port_of_loading')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="port_of_destination" class="col-sm-2 col-form-label">Port of Destination<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="port_of_destination"
                                    class="form-control @error('port_of_destination') is-invalid @enderror" id="port_of_destination"
                                    placeholder="Port of Destination" value="{{ old('port_of_destination') }}" autofocus autocomplete="off"
                                    required>
                                @error('port_of_destination')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                            {{-- <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="address" name="address"
                                    class="form-control @error('address') is-invalid @enderror" id="address"
                                    placeholder="alamat" value="{{ old('address') }}"autocomplete="off">
                                @error('address')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div> --}}
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="/invoices{{ str_replace('/invoices/create', '', request()->getRequestUri()) }}"
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
