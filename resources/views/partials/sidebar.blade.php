<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        {{-- <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
        <img src="/adminlte/dist/img/enclave-logo.png" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        {{-- <i class="fa-brands fa-google"></i> --}}
        <span class="brand-text font-weight-light">Enclave Inventory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link {{ $page == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table-columns"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/furnitures" class="nav-link {{ $page == 'furnitures' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chair"></i>
                        <p>
                            Furnitures
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link {{ $page == 'categories' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-swatchbook"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ str_contains($page, 'material') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ str_contains($page, 'material') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sheet-plastic"></i>
                        <p>
                            Materials
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/material1s" class="nav-link {{ $page == 'material1s' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Materials 1</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/material2s" class="nav-link {{ $page == 'material2s' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Materials 2</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/material3s" class="nav-link {{ $page == 'material3s' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Materials 3</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/material4s" class="nav-link {{ $page == 'material4s' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Materials 4</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/finishings" class="nav-link {{ $page == 'finishings' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-brush"></i>
                        <p>
                            Finishings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/applications" class="nav-link {{ $page == 'applications' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bars-staggered"></i>
                        <p>
                            Applications
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/suppliers" class="nav-link {{ $page == 'suppliers' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Supplier
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/orders" class="nav-link {{ $page == 'orders' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            PO
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/invoices" class="nav-link {{ $page == 'invoices' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Invoice
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
