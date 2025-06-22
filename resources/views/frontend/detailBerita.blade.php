@extends('frontend.layouts.app')

@section('title', 'Detail Berita')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <!-- Konten Utama -->
            <div class="col-lg-7">
                <h1 class="fw-bold mb-3">{{ $berita->judul }}</h1>

                <div class="text-muted small mb-4">
                    <span><i class="bi bi-bookmark-fill me-1"></i>{{ $berita->kategori->nama ?? 'Tanpa Kategori' }}</span> |
                    <span><i class="bi bi-calendar3 me-1"></i>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
                </div>

                @if ($berita->file)
                    <div class="mb-4 overflow-hidden rounded shadow-sm">
                        <img alt="{{ $berita->judul }}" class="img-fluid w-100 h-100 object-fit-cover" src="{{ asset('storage/' . $berita->file) }}">
                    </div>
                @endif

                <div class="berita-konten">
                    {!! $berita->konten !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-5">
                <!-- Berita Terbaru -->
                <div class="rounded-3 mb-4 border p-4 shadow-sm">
                    <h5 class="mb-3">Berita Terbaru</h5>
                    @foreach ($beritaTerbaru as $b)
                        <a class="text-decoration-none text-dark" href="{{ route('berita.detail', $b->id) }}">
                            <div class="d-flex align-items-start mb-3 gap-3">
                                <div class="flex-shrink-0">
                                    <img alt="{{ $b->judul }}" class="rounded" src="{{ $b->file && Storage::disk('public')->exists($b->file) ? asset('storage/' . $b->file) : asset('images/default.jpg') }}" style="width: 80px; height: 60px; object-fit: cover;">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-semibold mb-1">{{ \Str::limit($b->judul, 50) }}</h6>
                                    <small class="text-muted d-block">{{ $b->created_at->translatedFormat('d M Y') }}</small>
                                    <small class="text-muted">{{ \Str::limit(strip_tags($b->konten), 60) }}</small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pengumuman Terbaru -->
                <div class="rounded-3 border p-4 shadow-sm">
                    <h5 class="mb-3">Pengumuman Terbaru</h5>
                    {{-- Tambahkan konten pengumuman di sini --}}
                </div>
            </div>
        </div>
    </div>
@endsection
