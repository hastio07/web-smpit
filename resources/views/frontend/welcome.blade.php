@extends('frontend.layouts.app')

@section('title', 'Halaman Utama')

@push('styles')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section>

        {{-- welcome card --}}
        <div class="hero-section d-flex align-items-center py-5 text-center text-white">
            <div class="container">
                <div class="row align-items-center justify-content-center position-relative">

                    <!-- Gambar Kiri -->
                    <div class="col-12 col-md-3 mb-md-0 d-flex justify-content-center position-relative gambar-kiri mb-4">
                        <div class="position-relative" style="max-height: 100vh; overflow: hidden;">
                            <img alt="Gambar Kiri" class="img-fluid w-100 rounded" src="{{ asset('images/orang-senang5.png') }}" style="object-fit: contain; max-height: 100vh;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 150px; background: linear-gradient(to bottom, rgba(13, 202, 240, 0), rgba(13, 202, 240, 1));"></div>
                        </div>
                    </div>

                    <!-- Teks Tengah -->
                    <div class="col-12 col-md-6 teks-tengah text-center">
                        <h1 class="fw-bold display-5">Selamat Datang Di<br>SMPIT Bina Insani</h1>
                        <p class="lead mt-3">Sekolahnya Para Juara Pemburu Sukses Dunia Akhirat</p>
                        <div class="d-flex justify-content-center mt-4 flex-wrap gap-3">
                            <a class="btn btn-warning fw-semibold px-4 py-2" href="#">Ayo Daftarkan Dirimu</a>
                            <a class="btn btn-secondary px-4 py-2 text-white" href="#">Layanan Customer</a>
                        </div>
                    </div>

                    <!-- Gambar Kanan -->
                    <div class="col-12 col-md-3 mt-md-0 d-flex justify-content-center position-relative gambar-kanan mt-4">
                        <div class="position-relative" style="max-height: 100vh; overflow: hidden;">
                            <img alt="Gambar Kanan" class="img-fluid w-100 rounded" src="{{ asset('images/orang-senang6.png') }}" style="object-fit: contain; max-height: 100vh;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 150px; background: linear-gradient(to bottom, rgba(13, 202, 240, 0), rgba(13, 202, 240, 1));"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- sosial media --}}
        <div class="container my-4">
            <div class="row justify-content-center rounded-5 p-5 text-center" data-aos="fade-up">
                <div class="head-sosmed mb-4">
                    <h1 class="mb-2">Sosial Media Kami</h1>
                    <p>Kunjungi kami di sosial media untuk berinteraksi lebih jauh</p>
                </div>

                {{-- TikTok --}}
                @isset($dataSosmed['TikTok'])
                    <div class="col-6 col-md-3 mb-4">
                        <a class="text-decoration-none text-dark" href="{{ $dataSosmed['TikTok']->link }}" target="_blank">
                            <div class="social-icon-box mb-2">
                                <i class="bi bi-tiktok fs-1"></i>
                            </div>
                            <div class="fw-semibold">
                                {{ $dataSosmed['TikTok']->nama }}
                            </div>
                        </a>
                    </div>
                @endisset

                {{-- Instagram --}}
                @isset($dataSosmed['Instagram'])
                    <div class="col-6 col-md-3 mb-4">
                        <a class="text-decoration-none text-dark" href="{{ $dataSosmed['Instagram']->link }}" target="_blank">
                            <div class="social-icon-box mb-2">
                                <i class="bi bi-instagram fs-1 text-danger"></i>
                            </div>
                            <div class="fw-semibold">
                                {{ $dataSosmed['Instagram']->nama }}
                            </div>
                        </a>
                    </div>
                @endisset

                {{-- YouTube --}}
                @isset($dataSosmed['YouTube'])
                    <div class="col-6 col-md-3 mb-4">
                        <a class="text-decoration-none text-dark" href="{{ $dataSosmed['YouTube']->link }}" target="_blank">
                            <div class="social-icon-box mb-2">
                                <i class="bi bi-youtube fs-1 text-danger"></i>
                            </div>
                            <div class="fw-semibold">
                                {{ $dataSosmed['YouTube']->nama }}
                            </div>
                        </a>
                    </div>
                @endisset

                {{-- Facebook --}}
                @isset($dataSosmed['Facebook'])
                    <div class="col-6 col-md-3 mb-4">
                        <a class="text-decoration-none text-dark" href="{{ $dataSosmed['Facebook']->link }}" target="_blank">
                            <div class="social-icon-box mb-2">
                                <i class="bi bi-facebook fs-1 text-primary"></i>
                            </div>
                            <div class="fw-semibold">
                                {{ $dataSosmed['Facebook']->nama }}
                            </div>
                        </a>
                    </div>
                @endisset

                {{-- Twitter --}}
                @isset($dataSosmed['Twitter'])
                    <div class="col-6 col-md-3 mb-4">
                        <a class="text-decoration-none text-dark" href="{{ $dataSosmed['Twitter']->link }}" target="_blank">
                            <div class="social-icon-box mb-2">
                                <i class="bi bi-twitter fs-1 text-info"></i>
                            </div>
                            <div class="fw-semibold">
                                {{ $dataSosmed['Twitter']->nama }}
                            </div>
                        </a>
                    </div>
                @endisset
            </div>
        </div>

        {{-- Sambutan Kepala Sekolah --}}
        <div class="bg-info p-3">
            <div class="container my-5">
                <div class="row g-4 align-items-start">
                    <!-- Foto Kepala Sekolah -->
                    <div class="col-md-6" data-aos="fade-right">
                        <div class="overflow-hidden rounded bg-white p-3 text-center shadow">
                            @if (!empty($profil?->foto))
                                <img alt="Foto Kepala Sekolah" class="img-fluid rounded-3 shadow-sm" src="{{ asset('storage/' . $profil->foto) }}" style="max-height: 360px; object-fit: cover;">
                            @else
                                <img alt="Foto Kepala Sekolah" class="img-fluid rounded-3 shadow-sm" src="{{ asset('images/kepsek.jpg') }}" style="max-height: 360px; object-fit: cover;">
                            @endif
                            <h5 class="text-dark fw-bold mb-0 mt-3">{{ $profil->nama ?? 'Nama Kepala Sekolah' }}</h5>
                            <small class="text-muted">{{ $profil->jabatan ?? 'Jabatan Kepala Sekolah' }}</small>
                        </div>
                    </div>

                    <!-- Sambutan -->
                    <div class="col-md-6" data-aos="fade-left">
                        <div class="text-white">
                            <h4 class="fw-bold mb-3">Sambutan Kepala Sekolah</h4>
                            {!! nl2br(e($profil->sambutan ?? 'Belum ada sambutan.')) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- keunggulan kami --}}
        <div class="p-3">
            <div class="container my-5">
                <div class="p-4 text-center">
                    <h4 class="mb-1">Keunggulan SMPIT Bina Insani</h4>
                    <p>Berikut Adalah 3 Keunggulan Sekolah Yang Harus Anda Tau!</p>
                </div>
                <div class="row g-4 align-items-start">
                    <!-- Video YouTube -->
                    <div class="col-md-6" data-aos="fade-right">
                        @if ($tigaProgram && $tigaProgram->youtube)
                            <div class="ratio ratio-16x9">
                                <iframe allowfullscreen class="rounded-5" src="{{ $tigaProgram->youtube }}"></iframe>
                            </div>
                        @else
                            <p class="text-danger">Video belum tersedia</p>
                        @endif

                    </div>

                    <!-- Keunggulan SMP -->
                    @if ($tigaProgram)
                        <div class="col-md-6" data-aos="fade-left">
                            <div class="h-100 p-4">
                                <div class="d-flex align-items-start mb-3">
                                    <i class="bi {{ $tigaProgram->icon1 }} fs-3 text-warning me-3"></i>
                                    <div>
                                        <h6 class="mb-1">{{ $tigaProgram->judul1 }}</h6>
                                        <small>{{ $tigaProgram->deskripsi1 }}</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-3">
                                    <i class="bi {{ $tigaProgram->icon2 }} fs-3 text-info me-3"></i>
                                    <div>
                                        <h6 class="mb-1">{{ $tigaProgram->judul2 }}</h6>
                                        <small>{{ $tigaProgram->deskripsi2 }}</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start">
                                    <i class="bi {{ $tigaProgram->icon3 }} fs-3 text-success me-3"></i>
                                    <div>
                                        <h6 class="mb-1">{{ $tigaProgram->judul3 }}</h6>
                                        <small>{{ $tigaProgram->deskripsi3 }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
                <div class="container my-5">
                    <div class="mb-4 text-center">
                        <h6 class="fw-bold">Program Unggulan Lain</h6>
                        <p class="text-muted">Program khas yang membentuk karakter Islami, mandiri, dan berprestasi.</p>
                    </div>

                    <div class="row g-3 justify-content-center">
                        @foreach ($programs as $prog)
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="card program-card h-100 border-0 text-center shadow-sm">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <i class="bi {{ $prog->icon }} fs-2 {{ $prog->warna }} mb-2"></i>
                                        <small class="fw-semibold">{{ $prog->nama_program }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        {{-- berita terbaru --}}
        <div class="container my-5">
            <h2 class="text-center">Berita Terbaru</h2>
            <p class="text-center">Temukan info dan kisah terbaru dari lingkungan kita, jangan sampai ketinggalan!</p>
            @if ($beritaList->count())
                <div class="berita-slider mb-5">
                    @foreach ($beritaList as $berita)
                        <div class="px-2">
                            <div class="card w-100 h-100 rounded-3 mb-2 overflow-hidden border">
                                @if ($berita->file && Storage::disk('public')->exists($berita->file))
                                    <img alt="{{ $berita->judul }}" class="card-img-top rounded-0" src="{{ asset('storage/' . $berita->file) }}" style="height:200px;object-fit:cover;">
                                @else
                                    <img alt="Default" class="card-img-top rounded-0" src="{{ asset('images/default.jpg') }}" style="height:200px;object-fit:cover;">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $berita->judul }}</h5>
                                    {{-- <p class="card-text small text-muted">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 100) }}
                                    </p> --}}
                                    <p class="card-text text-muted small mt-auto">
                                        {{ $berita->kategori->nama ?? 'Tanpa Kategori' }} ·
                                        {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y') }}
                                    </p>
                                    <a class="btn btn-sm btn-info mt-2 text-white" href="{{ route('berita.detail', $berita->id) }}">
                                        Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a class="btn btn-info" href="/">Berita Lengkap</a>
                </div>
            @else
                <p class="text-center">Belum ada berita yang tersedia.</p>
            @endif
        </div>

        <!-- Carousel Testimoni -->
        <div class="carousel slide carousel-fade py-5 text-center" data-bs-interval="4000" data-bs-ride="carousel" id="carouselTestimoni">

            <div class="carousel-inner px-1">
                <div class="head">
                    <h1>Kata Alumni Tentang SMPITBI</h1>
                    <p>Yuk mengenal kami dari para alumni</p>
                </div>
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row g-4 justify-content-center p-3">

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card rounded-4 h-100 d-flex align-items-start flex-row border-0 p-3 shadow">
                                    <img alt="Alumni A" class="img-thumbnail rounded-circle me-3 mt-1" src="{{ asset('images/testimoni2.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="card-body p-0">
                                        <h4 class="card-title fw-semibold mb-1">Hamzah Irawan</h4>
                                        <h6>SMA Negeri 1 Metro</h6>
                                        <p class="card-text text-muted small text-truncate-3">“Sekolah ini luar biasa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in justo nec sapien gravida tincidunt.”</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card rounded-4 h-100 d-flex align-items-start flex-row border-0 p-3 shadow">
                                    <img alt="Alumni B" class="img-thumbnail rounded-circle me-3 mt-1" src="{{ asset('images/testimoni3.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="card-body p-0">
                                        <h4 class="card-title fw-semibold mb-1">Salsabila</h4>
                                        <h6>SMA Negeri 3 Metro</h6>
                                        <p class="card-text text-muted small text-truncate-3">“Saya belajar banyak di sini. Setiap guru memberikan perhatian dan dukungan luar biasa. Sekolah ini membentuk masa depan saya.”</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 d-none d-lg-block">
                                <div class="card rounded-4 h-100 d-flex align-items-start flex-row border-0 p-3 shadow">
                                    <img alt="Alumni C" class="img-thumbnail rounded-circle me-3 mt-1" src="{{ asset('images/testimoni4.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="card-body p-0">
                                        <h4 class="card-title fw-semibold mb-1">Fahmi Maulana</h4>
                                        <h6>SMA Muhammadiyah Metro</h6>
                                        <p class="card-text text-muted small text-truncate-3">“Pengalaman yang sangat berharga. Saya merekomendasikan sekolah ini kepada siapa pun yang ingin berkembang secara akademik dan pribadi.”</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row g-4 justify-content-center">

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card rounded-4 h-100 d-flex align-items-start flex-row border-0 p-3 shadow-sm">
                                    <img alt="Alumni D" class="img-thumbnail rounded-circle me-3 mt-1" src="{{ asset('images/testimoni1.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="card-body p-0">
                                        <h4 class="card-title fw-semibold mb-1">Aulia Rahma</h4>
                                        <h6>SMA Negeri 2 Metro</h6>
                                        <p class="card-text text-muted small text-truncate-3">“Fasilitas sekolah ini sangat lengkap dan mendukung proses pembelajaran yang efektif.”</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card rounded-4 h-100 d-flex align-items-start flex-row border-0 p-3 shadow-sm">
                                    <img alt="Alumni E" class="img-thumbnail rounded-circle me-3 mt-1" src="{{ asset('images/testimoni5.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="card-body p-0">
                                        <h4 class="card-title fw-semibold mb-1">Rizki Putra</h4>
                                        <h6>SMK Yadika Metro</h6>
                                        <p class="card-text text-muted small text-truncate-3">“Saya tumbuh bersama sekolah ini. Nilai-nilai yang diajarkan sangat membantu dalam kehidupan.”</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 d-none d-lg-block">
                                <div class="card rounded-4 h-100 d-flex align-items-start flex-row border-0 p-3 shadow-sm">
                                    <img alt="Alumni F" class="img-thumbnail rounded-circle me-3 mt-1" src="{{ asset('images/testimoni6.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="card-body p-0">
                                        <h4 class="card-title fw-semibold mb-1">Nadia Safitri</h4>
                                        <h6>MAN 1 Metro</h6>
                                        <p class="card-text text-muted small text-truncate-3">“Saya bangga menjadi bagian dari alumni sekolah ini. Banyak kenangan yang tak terlupakan.”</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- Indikator -->
            <div class="d-flex justify-content-center mt-4">
                <div class="carousel-indicators position-static">
                    <button aria-current="true" aria-label="Slide 1" class="active rounded-circle" data-bs-slide-to="0" data-bs-target="#carouselTestimoni" type="button"></button>
                    <button aria-label="Slide 2" class="rounded-circle" data-bs-slide-to="1" data-bs-target="#carouselTestimoni" type="button"></button>
                </div>
            </div>
        </div>


    </section>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.berita-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                dots: true,
                arrows: true,
                responsive: [{
                        breakpoint: 992, // tablet
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576, // hp
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>
@endpush
