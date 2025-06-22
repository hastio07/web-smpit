@extends('backend.layouts.app')

@section('title', isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ isset($siswa) ? 'Edit Data Siswa' : 'Tambah Data Siswa' }}</h1>

    <div class="card mb-4 shadow">
        <div class="card-body">
            <form action="{{ isset($siswa) ? route('siswa.update', $siswa->id) : route('siswa.store') }}" enctype="multipart/form-data" method="POST">

                @csrf
                @if (isset($siswa))
                    @method('PUT')
                @endif


                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input class="form-control" name="nama" required type="text" value="{{ old('nama', $siswa->nama ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input class="form-control" name="nis" required type="text" value="{{ old('nis', $siswa->nis ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <div class="col-md-4">
                        <select class="form-control" name="kelas" required>
                            <option {{ old('kelas', $siswa->kelas ?? '') == 'VII' ? 'selected' : '' }} value="VII">VII</option>
                            <option {{ old('kelas', $siswa->kelas ?? '') == 'VIII' ? 'selected' : '' }} value="VIII">VIII</option>
                            <option {{ old('kelas', $siswa->kelas ?? '') == 'IX' ? 'selected' : '' }} value="IX">IX</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" required>
                        <option {{ old('status', $siswa->status ?? '') == 'aktif' ? 'selected' : '' }} value="aktif">Aktif</option>
                        <option {{ old('status', $siswa->status ?? '') == 'tidak aktif' ? 'selected' : '' }} value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input class="form-control" name="nomor_hp" type="text" value="{{ old('nomor_hp', $siswa->nomor_hp ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" type="email" value="{{ old('email', $siswa->email ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input class="form-control" name="nama_ayah" type="text" value="{{ old('nama_ayah', $siswa->nama_ayah ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input class="form-control" name="nama_ibu" type="text" value="{{ old('nama_ibu', $siswa->nama_ibu ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3">{{ old('alamat', $siswa->alamat ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="foto">Foto Siswa</label>
                    <small class="form-text bg-danger d-inline-block rounded bg-opacity-50 px-2 py-1 text-white">
                        <i class="fas fa-exclamation-circle mr-1"></i> Format diperbolehkan: .jpg, .jpeg, .png dan ukuran Maksimal 2MB
                    </small>
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg aria-label="Warning:" class="bi bi-exclamation-triangle-fill me-2 flex-shrink-0" fill="currentColor" height="24" role="img" viewBox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div>
                            Gambar Maksimal 2MB
                        </div>
                    </div>
                    <input accept="image/*" class="form-control" id="foto" name="foto" type="file">

                    {{-- Preview Foto Lama --}}
                    @if (isset($siswa) && $siswa->foto)
                        <div class="mt-2">
                            <img alt="Foto Siswa" class="img-thumbnail" id="preview-foto" src="{{ asset('storage/' . $siswa->foto) }}" width="100">
                        </div>
                    @else
                        <div class="mt-2">
                            <img alt="Preview Foto" class="img-thumbnail d-none" id="preview-foto" width="100">
                        </div>
                    @endif
                </div>


                <button class="btn btn-primary" type="submit">
                    {{ isset($siswa) ? 'Update' : 'Simpan' }}
                </button>
                <a class="btn btn-secondary" href="{{ route('siswa.index') }}">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('foto').onchange = function(evt) {
            const [file] = this.files;
            const preview = document.getElementById('preview-foto');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
            }
        };
    </script>
@endpush
