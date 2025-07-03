@extends('frontend.layouts.app')

@section('title', 'Galeri Guru & Tendik')

@push('styles')
    <style>
        .gallery-flex {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            align-items: flex-start;
        }

        .photo-card {
            position: relative;
            display: inline-block;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .photo-card:hover {
            transform: scale(1.03);
        }

        .photo-card img {
            display: block;
            height: auto;
            width: auto;
            max-height: 250px;
        }

        .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo-card:hover .photo-overlay {
            opacity: 1;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">Galeri Guru & Tendik</h2>

        <div class="gallery-flex">
            @foreach ($data ?? ($tendikList ?? []) as $tendik)
                @if (!empty($tendik->foto))
                    <div class="photo-card">
                        <img alt="{{ $tendik->nama_lengkap }}" src="{{ asset('storage/' . $tendik->foto) }}">
                        <div class="photo-overlay">
                            <i class="bi bi-eye me-1"></i> View
                        </div>
                    </div>
                @endif
            @endforeach

            @if (($data ?? ($tendikList ?? collect()))->isEmpty())
                <p class="text-muted w-100 text-center">Belum ada data guru & tendik.</p>
            @endif
        </div>
    </div>
@endsection
