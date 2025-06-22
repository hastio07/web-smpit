<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logo-smpit.png') }}" style="width: 60px; height: 60px; object-fit: contain;">
        </div>
        <div class="sidebar-brand-text mx-3">SMPITBI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Interface</div>

    <!-- Components -->
    <li class="nav-item">
        <a aria-controls="collapseTwo" aria-expanded="true" class="nav-link collapsed {{ request()->is('admin/profil-kepsek') ? 'active' : '' }}" data-target="#collapseTwo" data-toggle="collapse" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div aria-labelledby="headingTwo" class="{{ request()->is('admin/profil-kepsek') ? 'show' : '' }} collapse" data-parent="#accordionSidebar" id="collapseTwo">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">Profil dan Sosmed:</h6>
                <a class="collapse-item {{ request()->is('admin/profil-kepsek') ? 'active' : '' }}" href="{{ url('admin/profil-kepsek') }}">Profil Kepsek</a>
                <a class="collapse-item {{ request()->routeIs('profilsekolah.index') ? 'active' : '' }}" href="{{ route('profilsekolah.index') }}">Profil Sekolah</a>
                <a class="collapse-item {{ request()->routeIs('sosialmedia.index') ? 'active' : '' }}" href="{{ route('sosialmedia.index') }}">Sosial Media</a>

            </div>
        </div>
    </li>
    <!-- Utilities -->
    <li class="nav-item">
        <a aria-controls="collapseUtilities" aria-expanded="true" class="nav-link collapsed" data-target="#collapseUtilities" data-toggle="collapse" href="#">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div aria-labelledby="headingUtilities" class="collapse" data-parent="#accordionSidebar" id="collapseUtilities">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item {{ request()->is('admin/tiga-program') ? 'active' : '' }}" href="{{ route('tigaprogram.index') }}">3 Unggulan Utama</a>
                <a class="collapse-item {{ request()->is('admin/program-unggulan') ? 'active' : '' }}" href="{{ route('program.index') }}">Program Unggulan</a>
                <a class="collapse-item" href="#">Animations</a>
                <a class="collapse-item" href="#">Other</a>
            </div>
        </div>

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Addons</div>

    <!-- Pages -->
    <li class="nav-item">
        <a aria-controls="collapsePages" aria-expanded="true" class="nav-link collapsed" data-target="#collapsePages" data-toggle="collapse" href="#">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div aria-labelledby="headingPages" class="collapse" data-parent="#accordionSidebar" id="collapsePages">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="">Daftar Tendik</a>
                <a class="collapse-item" href="{{ route('siswa.index') }}">Daftar Siswa</a>
                <a class="collapse-item" href="#">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item {{ request()->routeIs('berita.index') ? 'active' : '' }}" href="{{ route('berita.index') }}">Daftar Berita</a>
                <a class="collapse-item" href="#">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span>
        </a>
    </li>

    <!-- Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Akun</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="d-none d-md-inline text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
