<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('images/logo-smpit.png') }}" rel="icon" type="image/png">
    <title>@yield('title', 'Judul Default')</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts: Poppins -->
    <!-- Tambahkan di bagian <head> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Slick CSS -->
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet" />
    <!-- Slick Theme (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet" />
    @stack('styles')
</head>

<body>
    <section class="py-5 text-center text-white" style="background-image: url('{{ asset('images/background.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-start mx-1 px-3 py-4" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 1rem;">

                <!-- Kolom Logo (4 logo sejajar) -->
                <div class="col-12 col-lg-4 mb-lg-0 d-flex justify-content-center mb-3 flex-wrap gap-3">
                    <img alt="Logo Kota Metro" class="img-fluid logo-img" src="{{ asset('storage/' . $profilSekolah->logo_kota ?? '') }}" style="object-fit: contain;">

                    <img alt="Logo JSIT" class="img-fluid rounded-circle logo-img" src="{{ asset('storage/' . $profilSekolah->logo_jsit ?? '') }}" style="object-fit: cover;">

                    @if (!empty($profilSekolah->logo_yayasan))
                        <img alt="Logo Yayasan" class="img-fluid rounded-circle logo-img" src="{{ asset('storage/' . $profilSekolah->logo_yayasan) }}" style="object-fit: cover;">
                    @endif

                    @if (!empty($profilSekolah->logo_smpit))
                        <img alt="Logo SMPIT" class="img-fluid rounded-circle logo-img" src="{{ asset('storage/' . $profilSekolah->logo_smpit) }}" style="object-fit: cover;">
                    @endif
                </div>




                <!-- Kolom Teks -->
                <div class="col-12 col-lg-8 text-lg-start text-center">
                    <h1 class="fw-bold text-uppercase mb-2">{{ $profilSekolah->nama_sekolah ?? '' }}</h1>
                    <h5 class="fst-italic mb-1">{{ $profilSekolah->slogan ?? '' }}</h5>
                    <p class="mb-0">{{ $profilSekolah->alamat }}</p>
                </div>

            </div>
        </div>
    </section>


    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-warning navbar-dark py-2">
        <div class="container-fluid align-items-center">
            <!-- Brand dan Navigasi -->
            <div class="flex-grow-1 d-flex flex-column align-items-center text-center">
                <!-- Toggler dan Menu -->
                <button class="navbar-toggler border-0 text-white" data-bs-target="#navbarCenter" data-bs-toggle="collapse" type="button">
                    <i class="bi bi-chevron-compact-down fs-4"></i>
                </button>

                <div class="navbar-collapse justify-content-center collapse" id="navbarCenter">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link text-white" href="/">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Kontak</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('daftar.siswa') }}">Daftar Siswa</a>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Logo Kanan -->
        </div>
    </nav>


    {{-- Konten Dinamis --}}
    <div class="">
        @yield('content')
    </div>

    <div class="footer">
        <footer class="bg-info pt-5 text-white">
            <div class="container">
                <div class="row">
                    <!-- Kontak -->
                    <div class="col-md-6 mb-4">
                        <div class="d-flex mb-3 flex-wrap gap-3">
                            <img alt="Logo Kota Metro" class="img-fluid" src="{{ asset('storage/' . $profilSekolah->logo_kota ?? '') }}" style="width: 50px; height: 50px; object-fit: contain;">
                            <img alt="Logo JSIT" class="img-fluid rounded-circle" src="{{ asset('storage/' . $profilSekolah->logo_jsit ?? '') }}" style="width: 50px; height: 50px; object-fit: cover;">
                            <img alt="Logo Yayasan" class="img-fluid rounded-circle" src="{{ asset('storage/' . $profilSekolah->logo_yayasan ?? '') }}" style="width: 50px; height: 50px; object-fit: cover;">
                            <img alt="Logo SMPIT" class="img-fluid rounded-circle" src="{{ asset('storage/' . $profilSekolah->logo_smpit ?? '') }}" style="width: 50px; height: 50px; object-fit: cover;">
                        </div>
                        <h3>{{ $profilSekolah->nama_sekolah ?? '' }}</h3>
                        <p class="fst-italic">{{ $profilSekolah->slogan ?? '' }}</p>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-envelope-paper fs-5 me-2"></i>
                                <span>{{ $profilSekolah->email ?? '' }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-telephone-plus-fill fs-5 me-2"></i>
                                <span>{{ $profilSekolah->telepon ?? '' }}</span>
                            <li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-whatsapp fs-5 me-2"></i>
                                <span>{{ $profilSekolah->wa ?? '' }}</span>
                            <li>
                                <div class="d-flex mt-2 flex-wrap gap-3">
                                    <a class="fs-3 text-white" href="#"><i class="bi bi-facebook"></i></a>
                                    <a class="fs-3 text-white" href="#"><i class="bi bi-instagram"></i></a>
                                    <a class="fs-3 text-white" href="#"><i class="bi bi-twitter"></i></a>
                                    <a class="fs-3 text-white" href="#"><i class="bi bi-youtube"></i></a>
                                </div>
                            </li>
                        </ul>

                    </div>

                    <!-- Alamat dan Maps -->
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt-fill fs-5"></i>
                            <h5 class="mb-0">Alamat</h5>
                        </div>
                        <p>{{ $profilSekolah->alamat ?? '' }}</p>
                        <div class="ratio ratio-16x9">
                            <iframe class="rounded-3" height="100%" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="{{ $profilSekolah->maps ?? '' }}" style="border:0;" width="100%">
                            </iframe>

                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-top mt-3 pb-2 pt-3 text-center">
                    &copy; 2025 Hastio Wahyu. All rights reserved.
                </div>
            </div>
        </footer>

    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- jQuery (required by Slick) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Slick JS -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    @stack('scripts')

</body>

</html>
