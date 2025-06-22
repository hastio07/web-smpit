@extends('backend.layouts.app')

@section('title', 'Daftar Social Media')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">
            {{ isset($editItem) ? 'Edit Sosial Media' : 'Form Tambah Sosial Media' }}
        </h1>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Input --}}
        <div class="card mb-4 shadow">
            <div class="card-body">
                <form action="{{ isset($editItem) ? route('sosialmedia.update', $editItem->id) : route('sosialmedia.store') }}" method="POST">
                    @csrf
                    @if (isset($editItem))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="platform">Platform Sosial Media</label>
                        <select class="form-control" id="platform" name="platform" required>
                            <option {{ old('platform', $editItem->platform ?? '') == '' ? 'selected' : '' }} disabled value="">
                                Pilih Platform
                            </option>
                            @foreach (['Instagram', 'Facebook', 'YouTube', 'TikTok', 'Twitter'] as $p)
                                <option {{ old('platform', $editItem->platform ?? '') == $p ? 'selected' : '' }} value="{{ $p }}">
                                    {{ $p }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Akun</label>
                        <input class="form-control" id="nama" name="nama" placeholder="@smpit.binainsani" required type="text" value="{{ old('nama', $editItem->nama ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="link">Link</label>
                        <input class="form-control" id="link" name="link" placeholder="https://www.instagram.com/akunmu" required type="url" value="{{ old('link', $editItem->link ?? '') }}">
                    </div>

                    <button class="btn btn-{{ isset($editItem) ? 'warning' : 'primary' }}" type="submit">
                        <i class="fas fa-save mr-1"></i> {{ isset($editItem) ? 'Update' : 'Simpan' }}
                    </button>

                    @if (isset($editItem))
                        <a class="btn btn-secondary ml-2" href="{{ route('sosialmedia.index') }}">Batal</a>
                    @endif
                </form>
            </div>
        </div>

        {{-- Tabel Sosial Media --}}
        <div class="card shadow">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary m-0">Daftar Sosial Media</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table-hover table" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Platform</th>
                                <th>Nama Akun</th>
                                <th>Link</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sosmed as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->platform }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td><a href="{{ $row->link }}" target="_blank">{{ $row->link }}</a></td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('sosialmedia.edit', $row->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('sosialmedia.destroy', $row->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">Belum ada data sosial media.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');

            alerts.forEach(function(alert) {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';

                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 3000);
            });
        });
    </script>
@endpush
