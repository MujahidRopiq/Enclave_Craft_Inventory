@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Invoice</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              {{-- <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
              </div> --}}
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                    {{-- <img src="/adminlte/dist/img/enclave-logo.png" class="brand-image img-circle elevation-3"
                    style="opacity: .8"> --}}
                      <img class="profile-user-img img-fluid img-circle" src="/adminlte/dist/img/enclave-logo.png" alt="Enclave logo"> CV. Industri Classica Variasi
                      <small class="float-right">Email: info@enclavecraft.com</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  {{-- <div class="col-sm-4 invoice-col">
                    From
                    <address>
                      <strong>Admin, Inc.</strong><br>
                      795 Folsom Ave, Suite 600<br>
                      San Francisco, CA 94107<br>
                      Phone: (804) 123-5432<br>
                      Email: info@almasaeedstudio.com
                    </address>
                  </div> --}}
                  <!-- /.col -->
                  <div class="col-sm-10 invoice-col">
                    <b>{{$invoice->consignee}}:</b>
                    <div class="row-invoice-info">
                      <div class="col-sm-2 invoice-col">
                        <address>
                          {{$invoice->detail_consignee}}
                        </address>
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 invoice-col">
                    <b>#{{$invoice->no_invoice}}</b><br>
                    <br>
                    <b>No PO Buyer:</b> {{$invoice->no_po_buyer}}<br>
                    <b>POL:</b> {{$invoice->port_of_loading}}<br>
                    <b>POD:</b> {{$invoice->port_of_destination}}
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Furniture dipesan</th>
                          <th>QTY Order</th>
                          <th>Amount</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($invoice->invoice_furnitures as $data)
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
                            <td>{{$data->qty}}</td>
                            <td><span class="text-success text-bold">$ </span>{{$data->price}}</td>
                            <td><span class="text-success text-bold">$ </span>{{$data->total}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-8">
                    <h5 class="">Terms and Conditions:</h5>
                    {{-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> --}}

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                      {{$invoice->terms_and_conditions}}
                    </p>
                  </div>
                  <!-- /.col -->
                  {{-- <div class="col-6">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Subtotal:</th>
                          <td>$250.30</td>
                        </tr>
                        <tr>
                          <th>Tax (9.3%)</th>
                          <td>$10.34</td>
                        </tr>
                        <tr>
                          <th>Shipping:</th>
                          <td>$5.80</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td>$265.24</td>
                        </tr>
                      </table>
                    </div>
                  </div> --}}
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <a onclick="printInvoice()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    <div class="d-flex justify-content-end">
                      <a href="/invoices" class="btn btn-sm btn-dark mr-1">Kembali</a>
                      <a href="#" class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#status">Ubah
                          status</a>
                      <form action="/invoices/{{ $invoice->id . str_replace('/invoices/' . $invoice->id, '', request()->getRequestUri()) }}" method="post">
                          <input type="hidden" name="_token" value="RhAP6mv1TMVq7yxKt0tQvYEkmyePtceW8NZl0dBM" autocomplete="off">                            <input type="hidden" name="_method" value="delete">                            <button onclick="return confirm('PERHATIAN!!!\nInvoice 17-01-2024 akan dihapus secara permanen!')" type="submit" class="btn btn-sm btn-danger">Hapus</button>
                      </form>
                  </div>
                    {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                      Payment
                    </button>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                      <i class="fas fa-download"></i> Generate PDF
                    </button> --}}
                  </div>
                </div>
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->

    <div class="modal fade" id="status">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <form action="/invoices/{{ $invoice->id }}" method="post">
                  @csrf
                  @method('put')
                  <div class="modal-body mt-5">
                    <div class="row mb-2">
                      <div class="col-3">Status</div>
                      <div class="col-9">
                          <select name="status" class="form-control form-control-sm">
                              <option value="finished" {{ $data->status == 'finished' ? 'selected' : '' }}>
                                  Selesai
                              </option>
                              <option value="cancelled" {{ $data->status == 'cancelled' ? 'selected' : '' }}>
                                  Batal
                              </option>
                              <option value="in Progress"
                                  {{ $data->status == 'in Progress' ? 'selected' : '' }}>
                                  Proses
                              </option>
                          </select>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer justify-content-end">
                      <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
    <script>
      function printInvoice(){
        window.print()
      }
    </script>
@endsection
