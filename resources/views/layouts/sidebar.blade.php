<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Apotek</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" >{{ Auth::user()->name }}</a>
            </div>
        </div>

        {{-- <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>



                {{-- @if (auth()->user()->role_id('1') || auth()->user()->role_id('2')) --}}
                <li class="nav-header">MASTER</li>
                <!-- @if (auth()->user()->is_manajemen == 1 || auth()->user()->is_manajemen == 0) -->
                @if (auth()->user()->is_manajemen == 1)
                <li class="nav-item">
                    <a href="/pegawai" class="nav-link">
                        <i class="nav-icon fa fa-user-circle"></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="/pasien" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Pasien
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/obat" class="nav-link">
                        <i class="nav-icon fas fa fa-medkit"></i>
                        <p>
                            Penjualan Obat
                        </p>
                    </a>
                </li>
                @endif

                {{-- @if (auth()->user()->hasRole('1')) --}}

                @if (auth()->user()->is_manajemen == 1)
                <li class="nav-item">
                    <a href="/stokobat" class="nav-link">
                        <i class="nav-icon fas fa fa-medkit"></i>
                        <p>
                           Obat
                        </p>
                    </a>
                </li>
                @endif

                {{-- <li class="nav-header">REPORT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p class="text">Laporan</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-header">PENGATURAN</li> --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fas fa-cog"></i>
                        <p>Setting</p>
                    </a>
                </li> --}}

                {{-- @if (auth()->user()->is_manajemen == 1 || auth()->user()->is_manajemen == 0)
                <li class="nav-item">
                    <a href="/profile" class="nav-link">
                        <i class=" nav-icon fas fa-user-edit"></i>
                        <p>Profil</p>
                    </a>
                </li>
                @endif --}}

            </ul>
        </nav> <!-- /.en- sidebar -->
    </div>
    <!-- /.sidebar -->
</aside>
