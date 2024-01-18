@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Furniture</h1>
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
            <form action="/furnitures" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card">
                    <div class="bg-dark card-header">
                        <h3 class="card-title">Form Tambah Furniture</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama furniture<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="nama" value="{{ old('name') }}" autofocus autocomplete="off" required>
                                @error('name')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-sm-2 col-form-label">Stock furniture</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" name="stock"
                                    class="form-control @error('stock') is-invalid @enderror" id="stock"
                                    placeholder="stock" value="{{ old('stock') }}" autofocus autocomplete="off" required>
                                @error('stock')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description"
                                    id="description" placeholder="deskripsi...">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="certification" class="col-sm-2 col-form-label">Sertifikat</label>
                            <div class="col-sm-10">
                                <input type="text" name="certification"
                                    class="form-control @error('certification') is-invalid @enderror" id="certification"
                                    placeholder="sertifikat"
                                    value="{{ old('certification') ?? 'V-Legal' }}"autocomplete="off">
                                @error('certification')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qty_per_month" class="col-sm-2 col-form-label">Qty/Month</label>
                            <div class="col-sm-10">
                                <input type="number" name="qty_per_month"
                                    class="form-control @error('qty_per_month') is-invalid @enderror" id="qty_per_month"
                                    placeholder="qty/month" value="{{ old('qty_per_month') }}"autocomplete="off"
                                    min="0">
                                @error('qty_per_month')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="moq" class="col-sm-2 col-form-label">MOQ</label>
                            <div class="col-sm-10">
                                <input type="number" name="moq" class="form-control @error('moq') is-invalid @enderror"
                                    id="moq" placeholder="moq" value="{{ old('moq') }}"autocomplete="off"
                                    min="0">
                                @error('moq')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">Kategori<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="category_id" id="category_id"
                                    style="width: 100%;" required>
                                    @foreach ($categories as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('category_id') == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="material1_id" class="col-sm-2 col-form-label">Materail 1</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="material1_id" id="material1_id"
                                    style="width: 100%;" required>
                                    @foreach ($material1s as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('material1_id') == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('material1_id')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="material2_id" class="col-sm-2 col-form-label">Materail 2</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="material2_id" id="material2_id"
                                    style="width: 100%;" required>
                                    @foreach ($material2s as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('material2_id') == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('material2_id')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="material3_id" class="col-sm-2 col-form-label">Materail 3</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="material3_id" id="material3_id"
                                    style="width: 100%;" required>
                                    @foreach ($material3s as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('material3_id') == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('material3_id')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="material4_id" class="col-sm-2 col-form-label">Materail 4</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="material4_id" id="material4_id"
                                    style="width: 100%;" required>
                                    @foreach ($material4s as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('material4_id') == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('material4_id')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="finishing_id" class="col-sm-2 col-form-label">Finishing<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="select2" name="finishing_id[]" id="finishing_id" multiple="multiple"
                                    data-placeholder="Pilih finishing" style="width: 100%;" required>
                                    @foreach ($finishings as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('finishing_id') && in_array($data->id, old('finishing_id')) ? 'selected' : '' }}>
                                            {{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('finishing_id')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="application_id" class="col-sm-2 col-form-label">Application<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="select2" name="application_id[]" id="application_id" multiple="multiple"
                                    data-placeholder="Pilih application" style="width: 100%;" required>
                                    @foreach ($applications as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('application_id') && in_array($data->id, old('application_id')) ? 'selected' : '' }}>
                                            {{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('application_id')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keyword" class="col-sm-2 col-form-label">Kata kunci</label>
                            <div class="col-sm-10">
                                <input type="text" name="keyword"
                                    class="form-control @error('keyword') is-invalid @enderror" id="keyword"
                                    placeholder="kata kunci" value="{{ old('keyword') }}"autocomplete="off">
                                @error('keyword')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ukuran<span
                                    class="font-weight-light text-gray font-italic">(
                                    cm)</span><span class="text-danger">*</span></label>
                            <div class="col-sm pb-2">
                                <input type="number" name="length"
                                    class="form-control @error('length') is-invalid @enderror" id="length"
                                    placeholder="panjang" value="{{ old('length') }}"autocomplete="off" required
                                    min="0">
                                @error('length')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm pb-2">
                                <input type="number" name="width"
                                    class="form-control @error('width') is-invalid @enderror" id="width"
                                    placeholder="lebar" value="{{ old('width') }}"autocomplete="off" required
                                    min="0">
                                @error('width')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm">
                                <input type="number" name="height"
                                    class="form-control @error('height') is-invalid @enderror" id="height"
                                    placeholder="tinggi" value="{{ old('height') }}"autocomplete="off" required
                                    min="0">
                                @error('height')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fitur</label>
                            <div class="col-sm pb-2 d-flex align-items-center flex-wrap">
                                <div class="icheck-primary mr-5">
                                    <input type="checkbox" name="convertible" id="convertible" value="1"
                                        {{ old('convertible') ? 'checked' : '' }}>
                                    <label for="convertible">Convertible</label>
                                </div>
                                <div class="icheck-primary mr-5">
                                    <input type="checkbox" name="adjustable" id="adjustable" value="1"
                                        {{ old('adjustable') ? 'checked' : '' }}>
                                    <label for="adjustable">Adjustable</label>
                                </div>
                                <div class="icheck-primary mr-5">
                                    <input type="checkbox" name="extendable" id="extendable" value="1"
                                        {{ old('extendable') ? 'checked' : '' }}>
                                    <label for="extendable">Extendable</label>
                                </div>
                                <div class="icheck-primary mr-5">
                                    <input type="checkbox" name="Folded" id="Folded" value="1"
                                        {{ old('Folded') ? 'checked' : '' }}>
                                    <label for="Folded">Folded</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Harga satuan <span
                                    class="font-weight-bold text-success">$</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                    placeholder="harga satuan" value="{{ old('price') }}" step="0.01"
                                    min="0" max="999999" autocomplete="off">
                                @error('price')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_options" class="col-sm-2 col-form-label">Opsi pembayaran</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="payment_options" id="payment_options"
                                    style="width: 100%;">
                                    <option value="dp" {{ old('payment_options') == 'dp' ? 'selected' : '' }}>DP
                                    </option>
                                    <option value="full" {{ old('payment_options') == 'full' ? 'selected' : '' }}>Full
                                        Payment
                                    </option>
                                </select>
                                @error('payment_options')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_terms" class="col-sm-2 col-form-label">Aturan pembayaran</label>
                            <div class="col-sm-10">
                                <input type="text" name="payment_terms"
                                    class="form-control @error('payment_terms') is-invalid @enderror" id="payment_terms"
                                    placeholder="aturan pembayaran"
                                    value="{{ old('payment_terms') ?? 'DP 50%' }}"autocomplete="off">
                                @error('payment_terms')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="delivery_options" class="col-sm-2 col-form-label">Opsi pengiriman</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="delivery_options" id="delivery_options"
                                    style="width: 100%;">
                                    <option value="fob" {{ old('delivery_options') == 'fob' ? 'selected' : '' }}>FOB
                                    </option>
                                    <option value="exw" {{ old('delivery_options') == 'exw' ? 'selected' : '' }}>EX
                                        WORKS
                                    </option>
                                </select>
                                @error('delivery_options')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="delivery_time" class="col-sm-2 col-form-label">Waktu pengririman</label>
                            <div class="col-sm-10">
                                <input type="text" name="delivery_time"
                                    class="form-control @error('delivery_time') is-invalid @enderror" id="delivery_time"
                                    placeholder="waktu pengiriman" value="{{ old('delivery_time') }}"autocomplete="off">
                                @error('delivery_time')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lead_time" class="col-sm-2 col-form-label">Waktu pengerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" name="lead_time"
                                    class="form-control @error('lead_time') is-invalid @enderror" id="lead_time"
                                    placeholder="waktu pengerjaan" value="{{ old('lead_time') }}"autocomplete="off">
                                @error('lead_time')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="package" class="col-sm-2 col-form-label">Packing</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="package" id="package" style="width: 100%;">
                                    <option value="box" {{ old('package') == 'box' ? 'selected' : '' }}>BOX
                                    </option>
                                    <option value="corrugated paper"
                                        {{ old('package') == 'corrugated paper' ? 'selected' : '' }}>Corrugated Paper
                                    </option>
                                </select>
                                @error('package')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="port" class="col-sm-2 col-form-label">Port</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="port" id="port" style="width: 100%;">
                                    <option value='Tanjung Emas' {{ old('port') == 'Tanjung Emas' ? 'selected' : '' }}>
                                        Tanjung Emas</option>
                                    <option value='Franco Port' {{ old('port') == 'Franco Port' ? 'selected' : '' }}>
                                        Franco port</option>
                                </select>
                                @error('port')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            {{-- <div class="custom-file"> --}}
                            <label for="image" class="col-sm-2 col-form-label">Pilih gambar<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="file" name="image[]" id="image" multiple required>
                                @error('image')
                                    <small class="text-danger font-italic">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- </div> --}}
                        </div>
                        <div class="form-group row">
                            <div id="imagePreviews" class="d-flex justify-content-start flex-wrap">

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="/furnitures{{ str_replace('/furnitures/create', '', request()->getRequestUri()) }}"
                                class="btn btn-sm btn-danger mr-1">Batal</a>
                            <button type="submit" class="btn btn-sm btn-info">Tambah</button>
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        const imageInput = document.getElementById('image');
        const imagePreviews = document.getElementById('imagePreviews');

        imageInput.addEventListener('change', function() {
            imagePreviews.innerHTML = '';

            for (const file of this.files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.height = '150px';
                    img.classList.add('rounded', 'shadow-sm', 'border', 'm-1')
                    imagePreviews.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
