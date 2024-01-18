@extends('layouts.main')
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
            <form action="/invoices" method="post" class="form-horizontal">
                @csrf
                <div class="card">
                    <div class="bg-dark card-header">
                        <h3 class="card-title">Form Tambah Invoice</h3>
                        <div class="card-tools">
                            <a href="/invoice_selects" class="btn btn-sm btn-danger mr-1">Kembali</a>
                            <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="no_invoice" class="col-sm-2 col-form-label">No. Invoice<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="no_invoice"
                                    class="form-control @error('no_invoice') is-invalid @enderror" id="no_invoice"
                                    placeholder="No. Invoice" value="{{ old('no_invoice') }}" autofocus autocomplete="off" required>
                                @error('no_invoice')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="consignee" class="col-sm-2 col-form-label">Consignee<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="consignee"
                                    class="form-control @error('consignee') is-invalid @enderror" id="consignee"
                                    placeholder="Consignee" value="{{ old('consignee') }}" autofocus autocomplete="off" required>
                                @error('consignee')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detail_consignee" class="col-sm-2 col-form-label">Detail Consignee<span
                                class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('detail_consignee') is-invalid @enderror" rows="3" name="detail_consignee"
                                id="detail_consignee" placeholder="Detail Consignee"autofocus autocomplete="off" required>{{ old('detail_consignee') }}</textarea>
                                @error('detail_consignee')
                                <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="terms_and_conditions" class="col-sm-2 col-form-label">Terms and Conditions<span
                                class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('terms_and_conditions') is-invalid @enderror" rows="3" name="terms_and_conditions"
                                id="terms_and_conditions" placeholder="Terms and Conditions "autofocus autocomplete="off" required>{{ old('terms_and_conditions') }}</textarea>
                                @error('terms_and_conditions')
                                <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_po_buyer" class="col-sm-2 col-form-label">No. PO Buyer<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="no_po_buyer"
                                    class="form-control @error('no_po_buyer') is-invalid @enderror" id="no_po_buyer"
                                    placeholder="No. PO Buyer" value="{{ old('no_po_buyer') }}" autofocus autocomplete="off" required>
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
                                    placeholder="Port of Loading" value="{{ old('port_of_loading') }}" autofocus autocomplete="off" required>
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
                                    placeholder="Port of Destination" value="{{ old('port_of_destination') }}" autofocus autocomplete="off" required>
                                @error('port_of_destination')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr class="bg-dark">
                                    {{-- <th colspan="2"></th> --}}
                                    <th>Nama</th>
                                    <th class="text-right">Kategori</th>
                                    <th class="text-right">Ukuran</th>
                                    <th class="text-right">Jumlah barang</th>
                                    <th class="text-right"><span class="badge badge-success">$</span> Harga Satuan</th>
                                    <th class="text-right"><span class="badge badge-success">$</span> Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice_selects as $data)
                                    <input type="hidden" name="furniture_id[]" value="{{ $data->furniture->id }}">
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="rounded-lg"
                                                    style="background-position: center;background-size: cover; background-image: url({{ $data->furniture->furniture_images[0]->url }}); width: 32px; height: 32px" />
                                            </div>
                                            <div class="ml-2">
                                                {{ $data->furniture->name }}
                                                <div class="text-sm text-gray">{{ $data->furniture->sku }}</div>
                                            </div>
                                        </td>
                                        <td class="text-right">{{ $data->furniture->category->name }}</td>
                                        <td class="text-right">{{ $data->furniture->size }}</td>
                                        <td class="text-right">
                                            <input class="form form-control form-control-sm text-right" type="number"
                                                min="0" max="999999" name="qty[]" id="qty_{{ $data->id }}"
                                                autocomplete="off" required>
                                        </td>
                                        <td class="text-right">
                                            <input class="form form-control form-control-sm text-right" type="number"
                                                step="0.01" min="0" max="999999" name="price[]"
                                                id="price_{{ $data->id }}" autocomplete="off" required>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-bold text-success">$</span>
                                            <span id="total_{{ $data->id }}">0</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @foreach ($invoice_selects as $data)
        <script>
            const qty_{{ $data->id }} = document.querySelector('#qty_{{ $data->id }}')
            const price_{{ $data->id }} = document.querySelector('#price_{{ $data->id }}')
            const total_{{ $data->id }} = document.querySelector('#total_{{ $data->id }}')

            qty_{{ $data->id }}.addEventListener('change', (e) => {
                if (!e.target.value) e.target.value = parseInt(0)
                if (!price_{{ $data->id }}.value) price_{{ $data->id }}.value = parseInt(0)

                if (e.target.value < 0) {
                    e.target.value = parseInt(0)
                }
                total_{{ $data->id }}.innerHTML = (e.target.value * price_{{ $data->id }}.value).toFixed(2)
            })

            price_{{ $data->id }}.addEventListener('change', (e) => {
                if (!e.target.value) e.target.value = parseInt(0)
                if (!qty_{{ $data->id }}.value) qty_{{ $data->id }}.value = parseInt(0)

                if (e.target.value < 0) {
                    e.target.value = parseInt(0)
                }
                total_{{ $data->id }}.innerHTML = (e.target.value * qty_{{ $data->id }}.value).toFixed(2)
            })

            qty_{{ $data->id }}.addEventListener('keyup', (e) => {
                if (!e.target.value) e.target.value = parseInt(0)
                if (!price_{{ $data->id }}.value) price_{{ $data->id }}.value = parseInt(0)

                if (e.target.value < 0) {
                    e.target.value = parseInt(0)
                }
                total_{{ $data->id }}.innerHTML = (e.target.value * price_{{ $data->id }}.value).toFixed(2)
            })

            price_{{ $data->id }}.addEventListener('keyup', (e) => {
                if (!e.target.value) e.target.value = parseInt(0)
                if (!qty_{{ $data->id }}.value) qty_{{ $data->id }}.value = parseInt(0)

                if (e.target.value < 0) {
                    e.target.value = parseInt(0)
                }
                total_{{ $data->id }}.innerHTML = (e.target.value * qty_{{ $data->id }}.value).toFixed(2)
            })
        </script>
    @endforeach
@endsection
