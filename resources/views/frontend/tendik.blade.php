@extends('frontend.layouts.app')

@section('title', 'Daftar Guru & Tendik')

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/listSiswa.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container py-5">
        <h2 class="mb-5 text-center">Daftar Guru & Tendik</h2>

        <div class="row">
            @forelse ($data as $guru)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($guru->foto)
                            <img alt="{{ $guru->nama_lengkap }}" class="card-img-top" src="{{ asset('storage/' . $guru->foto) }}" style="height: 250px; object-fit: cover;">
                        @else
                            <img alt="Foto Default" class="card-img-top" src="{{ asset('images/default-user.png') }}" style="height: 250px; object-fit: cover;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $guru->nama_lengkap }}</h5>

                            <p class="mb-1">
                                <strong>Jenis PTK:</strong>
                                {{ is_array($guru->jenis_ptk) ? implode(', ', $guru->jenis_ptk) : $guru->jenis_ptk }}
                            </p>

                            <p class="mb-1"><strong>Jabatan:</strong> {{ $guru->jabatan ?? '-' }}</p>
                            <p class="mb-1"><strong>Mapel:</strong> {{ $guru->mapel->nama_mapel ?? '-' }}</p>
                            <p class="mb-1"><strong>Pendidikan:</strong> {{ $guru->pendidikan_terakhir }}</p>
                            <p class="mb-0"><strong>Status:</strong> {{ $guru->status_kepegawaian }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">Belum ada data guru & tendik.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
