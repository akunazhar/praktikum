<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

        <div class="sb-sidenav-menu">
            <div class="nav">

                <!-- Core Section -->
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Interface Section -->
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href="/users">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Users
                </a>

                <!-- Master Data Collapse -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Master Data
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/products">Product</a>
                        <a class="nav-link" href="/categories">Category</a>
                        {{-- <a class="nav-link" href="/satuans">Satuan</a> --}}
                        <a class="nav-link" href="/customers">Customer</a>
                        {{-- <a class="nav-link" href="/supplier">Supplier</a> --}}
                        {{-- <a class="nav-link" href="/transaction">Transaction</a> --}}
                    </nav>
                </div>

                <!-- Laporan Collapse -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Laporan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Product</a>
                        <a class="nav-link" href="#">Category</a>
                        <a class="nav-link" href="#">Customer</a>
                        {{-- <a class="nav-link" href="#">Supplier</a> --}}
                        {{-- <a class="nav-link" href="#">Transaction</a> --}}
                    </nav>
                </div>

            </div>
        </div>

        <!-- Sidebar Footer -->
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name ?? 'Start Bootstrap' }}
        </div>

    </nav>
</div>
