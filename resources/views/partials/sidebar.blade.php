<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="/adminlte/dist/img/enclave-logo.png" class="brand-image img-circle elevation-3"
            style="opacity: .8">
            {{-- <i class="fa-brands fa-google"></i> --}}
        <span class="brand-text font-weight-light">Enclave Inventory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/adminlte/dist/img/ryangosling.jpeg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Ryan Gosling</a>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item" style="margin-bottom:5px">
                    <a href="/"
                        class="nav-link {{ str_contains(request()->route()->getName(),'dashboard')? 'active': '' }}">
                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                        <i class="nav-icon fas fa-table-columns"></i>
                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                        <p style="font-size:1.1rem">
                            @if (str_contains(request()->route()->getName(),'dashboard'))
                            Dashboard
                            @else
                            <strong>
                            Dashboard
                            </strong>
                            @endif
                            </p>
                    </a>
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-chair"></i>
                                        <strong style="margin-left:8px">
                                        Inventaris
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/furnitures"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'furnitures')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">Produk</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-swatchbook"></i>
                                        <strong style="margin-left:8px">
                                        Kategori
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/categories"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'categories')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">Daftar Kategori</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-sheet-plastic"></i>
                                        <strong style="margin-left:8px">
                                        Material 1
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/material1s"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'material1s')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">List Material 1</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-sheet-plastic"></i>
                                        <strong style="margin-left:8px">
                                        Material 2
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/material2s"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'material2s')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">List Material 2</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-sheet-plastic"></i>
                                        <strong style="margin-left:8px">
                                        Material 3
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/material3s"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'material3s')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">List Material 3</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-sheet-plastic"></i>
                                        <strong style="margin-left:8px">
                                        Material 4
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/material4s"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'material4s')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">List Material 4</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-brush"></i>
                                        <strong style="margin-left:8px">
                                        Finishing
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/finishings"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'finishings')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">Finishing</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-bars-staggered"></i>
                                        <strong style="margin-left:8px">
                                        Application
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/applications"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'applications')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">Pengaplikasian</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-file-invoice"></i>
                                        <strong style="margin-left:8px">
                                        Purchase Order
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/furnitures"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'furnitures')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">Daftar furniture</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-receipt"></i>
                                        <strong style="margin-left:8px">
                                        Invoice
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/furnitures"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'furnitures')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">Daftar furniture</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-user-tie"></i>
                                        <strong style="margin-left:8px">
                                        Pemasok
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/furnitures"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'furnitures')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">Daftar furniture</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-header" style="padding:8px 22px; font-size:1.1rem">
                                    <a>
                                        <i class="nav-icon fas fa-users"></i>
                                        <strong style="margin-left:8px">
                                        Pegawai
                                        </strong>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/furnitures"
                                        class="nav-link {{ str_contains(request()->route()->getName(),'furnitures')? 'active': '' }}">
                                        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
                                        <!-- <i class="nav-icon fas fa-table-columns"></i> -->
                                        {{-- <img src="/img/icons/dashboard-reference-svgrepo-com.svg" style="width: 20px"> --}}
                                        <p style="margin-left:33px">Daftar furniture</p>
                                    </a>
                                </li>
                <li style="margin-bottom:5px">
                </li>

                <li class="nav-item {{ str_contains(request()->route()->getName(),'categories')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'categories')? 'active': '' }}">
                        <i class="nav-icon fas fa-swatchbook"></i>
                        <p>
                            Kategori
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/categories"
                                class="nav-link {{ str_contains(request()->route()->getName(),'categories')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">Daftar kategori</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(),'material1s')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'material1s')? 'active': '' }}">
                        <i class="nav-icon fas fa-sheet-plastic"></i>
                        <p>
                            Materials 1
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/material1s"
                                class="nav-link {{ str_contains(request()->route()->getName(),'material1s')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">List Materials 1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(),'material2s')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'material2s')? 'active': '' }}">
                        <i class="nav-icon fas fa-sheet-plastic"></i>
                        <p>
                            Materials 2
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/material2s"
                                class="nav-link {{ str_contains(request()->route()->getName(),'material2s')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">List Materials 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(),'material3s')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'material3s')? 'active': '' }}">
                        <i class="nav-icon fas fa-sheet-plastic"></i>
                        <p>
                            Materials 3
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/material3s"
                                class="nav-link {{ str_contains(request()->route()->getName(),'material3s')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">List Materials 3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(),'material4s')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'material4s')? 'active': '' }}">
                        <i class="nav-icon fas fa-sheet-plastic"></i>
                        <p>
                            Materials 4
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/material4s"
                                class="nav-link {{ str_contains(request()->route()->getName(),'material4s')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">List Materials 4</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(),'finishings')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'finishings')? 'active': '' }}">
                        <i class="nav-icon fas fa-brush"></i>
                        <p>
                            Finishing
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/finishings"
                                class="nav-link {{ str_contains(request()->route()->getName(),'finishings')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">Daftar finishing</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(),'applications')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'applications')? 'active': '' }}">
                        <i class="nav-icon fas fa-bars-staggered"></i>
                        <p>
                            Application
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/applications"
                                class="nav-link {{ str_contains(request()->route()->getName(),'applications')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">Daftar application</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(),'purchaseorders')? 'menu-open': '' }} {{ str_contains(request()->route()->getName(),'stockins')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'purchaseorders')? 'active': '' }} {{ str_contains(request()->route()->getName(),'stockins')? 'active': '' }}">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Purchase Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/purchaseorders"
                                class="nav-link {{ str_contains(request()->route()->getName(),'purchaseorders')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">Purchase Order</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/stockins"
                                class="nav-link {{ str_contains(request()->route()->getName(),'stockins')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">Stok masuk</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(),'invoices')? 'menu-open': '' }} {{ str_contains(request()->route()->getName(),'stockouts')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'invoices')? 'active': '' }} {{ str_contains(request()->route()->getName(),'stockouts')? 'active': '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Invoice
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/invoices"
                                class="nav-link {{ str_contains(request()->route()->getName(),'invoices')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> --> 
                                <p style="margin-left:33px">Invoice</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/stockouts"
                                class="nav-link {{ str_contains(request()->route()->getName(),'stockouts')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">Stok keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(),'suppliers')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'suppliers')? 'active': '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Pemasok
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/suppliers"
                                class="nav-link {{ str_contains(request()->route()->getName(),'suppliers')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">Pemasok</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if (Auth()->user()->role == 1)
                <li class="nav-item {{ str_contains(request()->route()->getName(),'users')? 'menu-open': '' }}">
                    <a href="#"
                        class="nav-link {{ str_contains(request()->route()->getName(),'users')? 'active': '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pegawai
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/users"
                                class="nav-link {{ str_contains(request()->route()->getName(),'users')? 'active': '' }}">
                                <!-- <i class="far fa-circle nav-icon"></i> -->
                                <p style="margin-left:33px">Pegawai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
