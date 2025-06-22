@extends('backend.layouts.app')

@section('title', 'Profil Kepala Sekolah')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card rounded-lg shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Form Profil Kepala Sekolah</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('profilkepsek.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <!-- Nama -->
                            <div class="form-group">
                                <label for="nama">Nama Kepala Sekolah</label>
                                <input class="form-control" id="nama" name="nama" required type="text" value="{{ old('nama', $profil->nama ?? '') }}">
                            </div>

                            <!-- Jabatan -->
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input class="form-control" id="jabatan" name="jabatan" required type="text" value="{{ old('jabatan', $profil->jabatan ?? '') }}">
                            </div>

                            <!-- Sambutan -->
                            <div class="form-group">
                                <label for="sambutan">Sambutan</label>
                                <textarea class="form-control" id="sambutan" name="sambutan" required rows="8">{{ old('sambutan', $profil->sambutan ?? '') }}</textarea>
                            </div>

                            <!-- Foto -->
                            <div class="form-group">
                                <label for="foto">Foto Kepala Sekolah</label>
                                <small class="form-text bg-danger d-inline-block rounded bg-opacity-50 px-2 py-1 text-white">
                                    <i class="fas fa-exclamation-circle mr-1"></i> Format: .jpg, .jpeg, .png, max 2MB
                                </small>
                                <input accept="image/*" class="form-control-file mt-2" id="foto" name="foto" type="file">

                                @if (!empty($profil->foto))
                                    <div class="mt-3">
                                        <strong>Foto Sekarang:</strong><br>
                                        <img class="img-thumbnail" id="preview-foto" src="{{ asset('storage/' . $profil->foto) }}" width="150">
                                    </div>
                                @else
                                    <img class="img-thumbnail d-none mt-3" id="preview-foto" width="150">
                                @endif
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Simpan Profil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('foto').addEventListener('change', function(e) {
            const [file] = e.target.files;
            if (file) {
                const preview = document.getElementById('preview-foto');
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
            }
        });
    </script>
@endpush
