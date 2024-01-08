@extends('layouts.table') 
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pegawai</h1>
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
                <div class="col-12">
                    <div class="card card-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Pegawai</h3>

                            <form action="/stockins">
                                <div class="card-tools d-flex justify-content-end">

                                    <div class="mr-2 d-flex align-items-center">
                                        <label class="text-sm text-gray mr-1">Tampilkan</label>
                                        <div class="input-group input-group-sm" style="width: 60px">
                                            <input type="number" min="0" name="show" class="form-control float-right" placeholder="tampilkan" value="{{ request('show') ?? 5 }}" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="input-group input-group-sm" style="width: 200px">
                                        <input type="text" name="search" class="form-control float-right"
                                            placeholder="Cari nama/email" value="{{ request('search') }}"
                                            autocomplete="off" />

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i> filter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            Nama/Email
                                            <span id="order-by-name" class="ml-1 btn btn-xs btn-secondary">
                                                <i
                                                    class="fas fa-solid fa-caret-{{ request('orderBy') == 'furniture_name' && request('order') == 'desc' ? 'up' : 'down' }}"></i>
                                            </span>
                                        </th>
                                        <th class="text-right"><a href="#" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-solid fa-plus"></i> Tambah
                                                Pegawai</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ $user->name }}
                                                <div class="text-gray text-sm">{{ $user->email }}</div>
                                            </td>
                                            <td class="project-actions text-right">
                                            
                                    <a href="{{ route('users.show', $user->id) }}"
                                        class="btn btn-outline-primary btn-sm mr-1">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <form action="" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button id="kt_account_deactivate_account_submit" type="submit"
                                            class="btn btn-outline-danger btn-sm me-1"
                                            onclick="return confirm('Akun akan dihapus secara permanen!\nlanjutkan')">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.5"
                                                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.5"
                                                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </form>
                                 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>

    <form action="/stockins" method="get" id="form-order-by-name">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="search" value="{{ request('suplier') ?? '' }}" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="orderBy" value="furniture_name" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <form action="/stockins" method="get" id="form-order-by-date">
        <input type="hidden" name="search" value="{{ request('search') ?? '' }}" />
        <input type="hidden" name="search" value="{{ request('suplier') ?? '' }}" />
        <input type="hidden" name="show" value="{{ request('show') ?? 5 }}" />
        <input type="hidden" name="orderBy" value="created_at" />
        <input type="hidden" name="order" value="{{ request('order') == 'desc' ? 'asc' : 'desc' }}" />
    </form>

    <script>
        const orderByName = document.querySelector("#order-by-name");
        const formOrderByName = document.querySelector("#form-order-by-name");

        const orderByDate = document.querySelector("#order-by-date");
        const formOrderByDate = document.querySelector("#form-order-by-date");

        orderByName.addEventListener("click", (e) => {
            e.preventDefault();

            formOrderByName.submit();
        });

        orderByDate.addEventListener("click", (e) => {
            e.preventDefault();

            formOrderByDate.submit();
        });
    </script>
@endsection
