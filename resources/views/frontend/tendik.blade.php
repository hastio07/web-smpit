@extends('frontend.layouts.app')

@section('title', 'Galeri Guru & Tendik')

@push('styles')
    <link href="{{ asset('css/tendik.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container py-5">
        {{-- Form Search --}}
        <h2 class="mb-4 text-center">Galeri Guru & Tendik</h2>
        <form action="{{ route('daftar.tendik') }}" class="d-flex justify-content-center mb-4" method="GET">
            <div class="input-group" style="max-width: 600px; width: 100%;">
                <input aria-label="Pencarian" class="form-control border-warning rounded-pill-start shadow-sm" name="search" placeholder="Cari nama guru atau tendik..." type="text" value="{{ request('search') }}">
                <button class="btn btn-warning rounded-pill-end px-4 text-white" type="submit">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
            </div>
        </form>

        {{-- Galeri --}}
        <div class="gallery-flex">
            @foreach ($data ?? [] as $tendik)
                @if (!empty($tendik->foto))
                    <a class="photo-card text-decoration-none" href="{{ route('guru.tendik.show', $tendik->id) }}">
                        <img alt="{{ $tendik->nama_lengkap }}" src="{{ asset('storage/' . $tendik->foto) }}">
                        <div class="photo-overlay">
                            <i class="bi bi-eye me-1"></i> View
                        </div>
                    </a>
                @endif
            @endforeach

            @if ($data->isEmpty())
                <p class="text-muted w-100 text-center">
                    @if (request('search'))
                        Maaf, guru dengan nama "<strong>{{ request('search') }}</strong>" tidak ada!
                    @else
                        Belum ada data guru & tendik.
                    @endif
                </p>
            @endif
        </div>
    </div>
@endsection
