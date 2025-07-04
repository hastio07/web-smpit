@extends('frontend.layouts.app')

@section('title', 'Berita')

@push('styles')
    <link href="{{ asset('css/berita.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container my-5">
        <h2 class="mb-1 text-center">Berita Sekolah</h2>

        {{-- 🔍 Form Pencarian --}}
        <form action="{{ route('berita.index') }}" class="d-flex justify-content-center my-4" method="GET">
            <div class="input-group" style="max-width: 600px; width: 100%;">
                <input aria-label="Pencarian" class="form-control border-warning rounded-pill-start shadow-sm" name="search" placeholder="Cari judul berita..." type="text" value="{{ request('search') }}">
                <button class="btn btn-warning rounded-pill-end px-4 text-white" type="submit">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
            </div>
        </form>

        @if ($beritaList->count())
            @foreach ($beritaList as $index => $berita)
                <div class="row align-items-center flex-column flex-md-row {{ $index % 2 !== 0 ? 'flex-md-row-reverse' : '' }} mb-5">
                    {{-- Gambar --}}
                    <div class="col-md-5 mb-md-0 mb-3" data-aos-delay="100" data-aos-duration="800" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                        <img alt="{{ $berita->judul }}" class="img-fluid w-100 rounded shadow-sm" src="{{ $berita->file && Storage::disk('public')->exists($berita->file) ? asset('storage/' . $berita->file) : asset('images/default.jpg') }}" style="object-fit: cover; height: 250px; width: 100%;">
                    </div>

                    {{-- Konten --}}
                    <div class="col-md-7" data-aos-delay="100" data-aos-duration="800" data-aos="{{ $index % 2 == 0 ? 'fade-left' : 'fade-right' }}">
                        <h4>{{ $berita->judul }}</h4>
                        <p class="text-muted small mb-1">
                            {{ $berita->kategori->nama ?? 'Tanpa Kategori' }} ·
                            {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y') }}
                        </p>
                        <p>
                            {{ \Illuminate\Support\Str::limit(html_entity_decode(str_replace('&nbsp;', ' ', strip_tags($berita->konten))), 150) }}
                        </p>
                        <a class="btn btn-warning text-white" href="{{ route('berita.detail', $berita->id) }}">
                            Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">
                @if (request('search'))
                    Tidak ditemukan berita dengan judul "<strong>{{ request('search') }}</strong>".
                @else
                    Belum ada berita yang tersedia.
                @endif
        @endif
    </div>
@endsection
