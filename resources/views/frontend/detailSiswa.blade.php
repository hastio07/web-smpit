@extends('frontend.layouts.app')

@section('title', 'Detail Siswa')

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleDetailSiswa.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container p-5">
        <div class="row g-4">
            <!-- Kolom Kiri: Profil Siswa -->
            <div class="col-12 col-lg-8">
                <div class="rounded-3 border p-4 shadow">
                    <h2 class="mb-0 text-center">{{ $siswa->nama }}</h2>
                    <div class="d-flex align-items-center justify-content-center mb-5 mt-2">
                        <div class="line line-left bg-warning"></div>
                        <span class="text-muted fw-semibold mx-3">Profil Siswa</span>
                        <div class="line line-right bg-warning"></div>
                    </div>

                    <div class="row">
                        <!-- Identitas Siswa -->
                        <div class="col-12 col-md-8">
                            <table class="table-borderless table">
                                <tr>
                                    <th style="width: 150px;">NIS</th>
                                    <td>: {{ $siswa->nis }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>: {{ $siswa->kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>: {{ ucfirst($siswa->status) }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: {{ $siswa->email }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor HP</th>
                                    <td>: {{ $siswa->nomor_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Orang Tua</th>
                                    <td>: {{ $siswa->nama_ayah }} / {{ $siswa->nama_ibu }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: {{ $siswa->alamat }}</td>
                                </tr>
                            </table>
                        </div>


                        <!-- Foto -->
                        <div class="col-12 col-md-4 text-center">
                            @if ($siswa->foto)
                                <img alt="Foto {{ $siswa->nama }}" class="img-fluid rounded shadow-sm" src="{{ asset('storage/' . $siswa->foto) }}" style="max-height: 350px; object-fit: cover;">
                            @else
                                <div class="text-muted">Tidak ada foto tersedia</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Berita Terbaru -->
            <div class="col-12 col-lg-4">
                <div class="rounded-3 h-100 border p-4 shadow-sm">
                    <h5 class="fw-bold mb-3">Berita Terbaru</h5>

                    <!-- Contoh isi berita -->
                    <div class="mb-3">
                        <h6 class="fw-semibold mb-1">Siswa Bina Insani Juara Olimpiade</h6>
                        <small class="text-muted">20 Juni 2025</small>
                        <p class="text-muted small mt-1">Siswa SMPIT Bina Insani berhasil meraih medali emas dalam ajang OSN tingkat nasional...</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="fw-semibold mb-1">Workshop Coding untuk Siswa</h6>
                        <small class="text-muted">18 Juni 2025</small>
                        <p class="text-muted small mt-1">Kegiatan workshop pengenalan dasar-dasar pemrograman sukses digelar dengan antusiasme tinggi...</p>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
