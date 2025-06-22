@extends('backend.layouts.app')

@section('title', 'Daftar Social Media')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Form Tambah Sosial Media</h1>

        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
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
                <form action="{{ route('sosialmedia.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="platform">Nama Sosial Media</label>
                        <select class="form-control" id="platform" name="platform" required>
                            <option disabled selected value="">Pilih Sosial Media</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Facebook">Facebook</option>
                            <option value="YouTube">YouTube</option>
                            <option value="TikTok">TikTok</option>
                            <option value="Twitter">Twitter</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Akun</label>
                        <input class="form-control" id="nama" name="nama" placeholder="@smpit.binainsani" required type="text">
                    </div>

                    <div class="form-group">
                        <label for="link">Link Sosial Media</label>
                        <input class="form-control" id="link" name="link" placeholder="https://www.instagram.com/akunmu" required type="url">
                    </div>

                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </form>
            </div>
        </div>

        {{-- Table Daftar Sosial Media --}}
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
                            @forelse ($dataSosmed as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->platform }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('sosialmedia.edit', $item->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('sosialmedia.destroy', $item->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
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
