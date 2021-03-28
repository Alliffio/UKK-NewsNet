<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="{{ route('lapor.create') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tulis Pengaduan
                    </a>
                    <a class="nav-link" href="{{ route('lapor.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        List Pengaduan
                    </a>
                    <a class="nav-link" href="{{ route('logout') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Log Out
                    </a>
                </div>
            </div>
        </nav>
    </div>