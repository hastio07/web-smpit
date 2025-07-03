@extends('backend.layouts.app')

@section('title', 'Mata Pelajaran')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Form Mata Pelajaran</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form Input --}}
        <div class="card mb-4 shadow">
            <div class="card-body">
                <form action="{{ isset($edit) ? route('mapel.update', $edit->id) : route('mapel.store') }}" method="POST">
                    @csrf
                    @if (isset($edit))
                        @method('PUT')
                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama Mapel</label>
                            <input class="form-control" name="nama_mapel" required type="text" value="{{ old('nama_mapel', $edit->nama_mapel ?? '') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kode Mapel</label>
                            <input class="form-control" name="kode_mapel" type="text" value="{{ old('kode_mapel', $edit->kode_mapel ?? '') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Kelompok</label>
                            <select class="form-control" name="kelompok" required>
                                <option disabled selected>Pilih</option>
                                @foreach (['Wajib', 'Tambahan', 'Ekstrakurikuler'] as $k)
                                    <option {{ old('kelompok', $edit->kelompok ?? '') == $k ? 'selected' : '' }} value="{{ $k }}">
                                        {{ $k }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tingkat</label>
                            <select class="form-control" name="tingkat" required>
                                <option {{ old('tingkat', $edit->tingkat ?? '') == '' ? 'selected' : '' }} disabled>Pilih</option>
                                @foreach (['Semua Jenjang', 'Kelas 7', 'Kelas 8', 'Kelas 9'] as $t)
                                    <option {{ old('tingkat', $edit->tingkat ?? '') == $t ? 'selected' : '' }} value="{{ $t }}">
                                        {{ $t }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori_mapel" required>
                                <option disabled selected>Pilih</option>
                                @foreach (['Umum', 'Agama', 'Khusus Sekolah'] as $c)
                                    <option {{ old('kategori_mapel', $edit->kategori_mapel ?? '') == $c ? 'selected' : '' }} value="{{ $c }}">
                                        {{ $c }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-{{ isset($edit) ? 'warning' : 'primary' }}">
                        <i class="fas fa-save mr-1"></i> {{ isset($edit) ? 'Update' : 'Simpan' }}
                    </button>

                    @if (isset($edit))
                        <a class="btn btn-secondary ml-2" href="{{ route('mapel.index') }}">Batal</a>
                    @endif
                </form>
            </div>
        </div>

        {{-- Tabel Data --}}
        <div class="card shadow">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary m-0">Daftar Mata Pelajaran</h6>
            </div>
            <div class="card-body">
                <table class="table-bordered table-hover table-sm table" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Mapel</th>
                            <th>Kode</th>
                            <th>Kelompok</th>
                            <th>Tingkat</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($allMapel as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_mapel }}</td>
                                <td>{{ $item->kode_mapel ?? '-' }}</td>
                                <td>{{ $item->kelompok }}</td>
                                <td>
                                    @if ($item->tingkat === 'Semua Jenjang')
                                        <span class="badge badge-info">Semua Jenjang</span>
                                    @else
                                        {{ $item->tingkat }}
                                    @endif
                                </td>

                                <td>{{ $item->kategori_mapel }}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('mapel.edit', $item->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('mapel.destroy', $item->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">Belum ada data mapel.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
