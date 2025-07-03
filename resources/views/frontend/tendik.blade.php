@extends('frontend.layouts.app')

@section('title', 'Galeri Guru & Tendik')

@push('styles')
    <style>
        .card-photo {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-photo:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }

        .card-photo img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 1rem;
        }

        .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 1rem;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-photo:hover .photo-overlay {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .card-photo img {
                height: 180px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">Galeri Guru & Tendik</h2>

        <div class="row g-4">
            @foreach ($data ?? ($tendikList ?? []) as $tendik)
                @if (!empty($tendik->foto))
                    <div class="col-6 col-md-4 col-lg-3">
                        <a class="text-decoration-none" href="/">
                            <div class="card-photo">
                                <img alt="{{ $tendik->nama_lengkap }}" src="{{ asset('storage/' . $tendik->foto) }}">
                                <div class="photo-overlay">
                                    <i class="bi bi-eye me-1"></i> View
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach

            @if (empty($data) && empty($tendikList))
                <div class="col-12 text-muted text-center">
                    <p>Belum ada data guru & tendik yang ditampilkan.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
