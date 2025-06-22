@extends('backend.layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
    <div class="container my-5">

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                <button aria-label="Tutup" class="btn-close" data-bs-dismiss="alert" type="button"></button>
            </div>
        @endif

        {{-- Form Tambah --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">Tambah Program Unggulan</div>
            <div class="card-body">
                <form action="{{ route('program.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="nama_program">Nama Program</label>
                            <input class="form-control" name="nama_program" required type="text">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="icon">Icon</label>
                            <input class="form-control" name="icon" placeholder="contoh: bi-book" required type="text">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="warna">Warna</label>
                            <select class="form-select" id="warna" name="warna" required>
                                <option style="background-color:#198754; color:white;" value="text-success">Hijau</option>
                                <option style="background-color:#0d6efd; color:white;" value="text-primary">Biru</option>
                                <option style="background-color:#ffc107; color:black;" value="text-warning">Kuning</option>
                                <option style="background-color:#dc3545; color:white;" value="text-danger">Merah</option>
                                <option style="background-color:#0dcaf0; color:black;" value="text-info">Biru Muda</option>
                                <option style="background-color:#6c757d; color:white;" value="text-secondary">Abu-abu</option>
                            </select>
                        </div>

                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Tampilkan Program --}}
        <div class="row g-3 justify-content-center">
            @foreach ($programs as $prog)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="card program-card h-100 position-relative border-0 text-center shadow-sm">

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('program.destroy', $prog->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus program ini?')" style="position: absolute; top: 5px; right: 5px; z-index: 10;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger rounded p-1" title="Hapus" type="submit">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>

                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi {{ $prog->icon }} fs-2 {{ $prog->warna }} mb-2"></i>
                            <small class="fw-semibold">{{ $prog->nama_program }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
