<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logo-smpit.png') }}" style="width: 60px; height: 60px; object-fit: contain;">
        </div>
        <div class="sidebar-brand-text mx-3">SMPITBI</div>
    </a>

    <hr class="sidebar-divider my-0">

    {{-- Dashboard --}}
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    {{-- Heading --}}
    <div class="sidebar-heading">Interface</div>

    {{-- Components - Profil & Sosmed --}}
    @php
        $profilActive = request()->is('admin/profil-kepsek', 'admin/profil-sekolah', 'admin/sosial-media');
    @endphp
    <li class="nav-item">
        <a aria-controls="collapseProfil" aria-expanded="{{ $profilActive ? 'true' : 'false' }}" class="nav-link {{ $profilActive ? '' : 'collapsed' }}" data-target="#collapseProfil" data-toggle="collapse" href="#">
            <i class="fas fa-school"></i>
            <span>Profil & Sosmed</span>
        </a>
        <div class="{{ $profilActive ? 'show' : '' }} collapse" data-parent="#accordionSidebar" id="collapseProfil">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">Profil dan Sosmed:</h6>
                <a class="collapse-item {{ request()->is('admin/profil-kepsek') ? 'active' : '' }}" href="{{ url('admin/profil-kepsek') }}">Profil Kepsek</a>
                <a class="collapse-item {{ request()->routeIs('profilsekolah.index') ? 'active' : '' }}" href="{{ route('profilsekolah.index') }}">Profil Sekolah</a>
                <a class="collapse-item {{ request()->routeIs('sosialmedia.index') ? 'active' : '' }}" href="{{ route('sosialmedia.index') }}">Sosial Media</a>
            </div>
        </div>
    </li>

    {{-- Utilities - Program --}}
    @php
        $programActive = request()->is('admin/program-unggulan', 'admin/tiga-program');
    @endphp
    <li class="nav-item">
        <a aria-controls="collapseProgram" aria-expanded="{{ $programActive ? 'true' : 'false' }}" class="nav-link {{ $programActive ? '' : 'collapsed' }}" data-target="#collapseProgram" data-toggle="collapse" href="#">
            <i class="fas fa-book-open"></i>
            <span>Program</span>
        </a>
        <div class="{{ $programActive ? 'show' : '' }} collapse" data-parent="#accordionSidebar" id="collapseProgram">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">Program Sekolah:</h6>
                <a class="collapse-item {{ request()->routeIs('tigaprogram.index') ? 'active' : '' }}" href="{{ route('tigaprogram.index') }}">3 Unggulan Utama</a>
                <a class="collapse-item {{ request()->routeIs('program.index') ? 'active' : '' }}" href="{{ route('program.index') }}">Program Unggulan</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    {{-- Heading --}}
    <div class="sidebar-heading">Komponen Sekolah</div>

    {{-- Pages - Akademik --}}
    @php
        $akademikActive = request()->is('admin/siswa', 'admin/berita*', 'admin/mapel*', 'admin/guru-tendik*', 'admin/rombel*');
    @endphp

    <li class="nav-item">
        <a aria-controls="collapseAkademik" aria-expanded="{{ $akademikActive ? 'true' : 'false' }}" class="nav-link {{ $akademikActive ? '' : 'collapsed' }}" data-toggle="collapse" href="#collapseAkademik" role="button">
            <i class="fas fa-fw fa-folder"></i>
            <span>Akademik</span>
        </a>
        <div class="{{ $akademikActive ? 'show' : '' }} collapse" data-parent="#accordionSidebar" id="collapseAkademik">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">Akademik Sekolah:</h6>

                <a class="collapse-item {{ request()->routeIs('siswa.index') ? 'active' : '' }}" href="{{ route('siswa.index') }}">
                    Daftar Siswa
                </a>
                <a class="collapse-item {{ request()->routeIs('berita.index') ? 'active' : '' }}" href="{{ route('berita.index') }}">
                    Daftar Berita
                </a>
                <a class="collapse-item {{ request()->routeIs('mapel.index') ? 'active' : '' }}" href="{{ route('mapel.index') }}">
                    Mata Pelajaran
                </a>
                <a class="collapse-item {{ request()->routeIs('guru.tendik.index') ? 'active' : '' }}" href="{{ route('guru.tendik.index') }}">
                    Daftar Guru & Tendik
                </a>
                <a class="collapse-item {{ request()->routeIs('rombel.form') ? 'active' : '' }}" href="{{ route('rombel.form') }}">
                    Data Kelas & Rombel
                </a>

                {{-- Placeholder --}}
                <a class="collapse-item disabled" href="{{ route('coming.soon') }}">Jadwal Pelajaran</a>
                <a class="collapse-item disabled" href="{{ route('coming.soon') }}">Data Nilai Siswa</a>
                <a class="collapse-item disabled" href="{{ route('coming.soon') }}">Absensi Siswa</a>
                <a class="collapse-item disabled" href="{{ route('coming.soon') }}">Ekstrakurikuler</a>
                <a class="collapse-item disabled" href="{{ route('coming.soon') }}">Prestasi Siswa</a>
                <a class="collapse-item disabled" href="{{ route('coming.soon') }}">Kalender Akademik</a>
            </div>
        </div>
    </li>


    {{-- Charts (optional) --}}
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-trophy"></i>
            <span>Prestasi Siswa</span>
        </a>
    </li>


    {{-- Tables (optional) --}}
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Manajemen Akun</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    {{-- Sidebar Toggler --}}
    <div class="d-none d-md-inline text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
