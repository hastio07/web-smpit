@extends('backend.layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Profil Sekolah</h1>

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

        {{-- Form --}}
        <div class="card mb-4 shadow">
            <div class="card-body">
                <form action="{{ route('profilsekolah.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    {{-- Nama Sekolah --}}
                    <div class="form-group">
                        <label for="nama_sekolah">Nama Sekolah</label>
                        <input class="form-control" id="nama_sekolah" name="nama_sekolah" required type="text" value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}">
                    </div>

                    {{-- Slogan --}}
                    <div class="form-group">
                        <label for="slogan">Slogan</label>
                        <textarea class="form-control" id="slogan" name="slogan" rows="2">{{ old('slogan', $profil->slogan ?? '') }}</textarea>
                    </div>

                    {{-- Alamat --}}
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                    </div>

                    {{-- Kontak --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="telepon">Telepon</label>
                            <input class="form-control" id="telepon" name="telepon" type="text" value="{{ old('telepon', $profil->telepon ?? '') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="wa">WhatsApp</label>
                            <input class="form-control" id="wa" name="wa" type="text" value="{{ old('wa', $profil->wa ?? '') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $profil->email ?? '') }}">
                        </div>
                    </div>

                    {{-- Maps Embed --}}
                    <div class="form-group">
                        <label for="maps">Link Embed Google Maps</label>
                        <textarea class="form-control" id="maps" name="maps" placeholder="https://www.google.com/maps/embed?..." rows="2">{{ old('maps', $profil->maps ?? '') }}</textarea>
                    </div>

                    {{-- Upload Logo Sekolah --}}
                    @php
                        $logoFields = [
                            'logo_smpit' => 'Logo SMPIT',
                            'logo_jsit' => 'Logo JSIT',
                            'logo_yayasan' => 'Logo Yayasan',
                            'logo_kota' => 'Logo Kota',
                        ];
                    @endphp

                    <div class="row rounded border">
                        @foreach ($logoFields as $field => $label)
                            <div class="form-group col-md-6 gap-1">
                                <label for="{{ $field }}">{{ $label }}</label>
                                @if (!empty($profil->$field))
                                    <div class="mb-2">
                                        <img alt="{{ $label }}" src="{{ asset('storage/' . $profil->$field) }}" style="max-height: 80px;">
                                    </div>
                                @endif
                                <div class="custom-file">
                                    <input class="custom-file-input" id="{{ $field }}" name="{{ $field }}" type="file">
                                    <label class="custom-file-label" for="{{ $field }}">Pilih file...</label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Submit --}}
                    <button class="btn btn-primary mt-3" type="submit">
                        <i class="fas fa-save mr-1"></i> Simpan Profil
                    </button>
                    {{-- Tampilkan Peta jika tersedia --}}
                    @if (!empty($profil->maps))
                        <div class="mb-4 mt-5">
                            <label class="fw-bold">Peta Lokasi:</label>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe allowfullscreen class="embed-responsive-item" frameborder="0" src="{{ $profil->maps }}"></iframe>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Tampilkan nama file saat dipilih
        document.querySelectorAll('.custom-file-input').forEach(input => {
            input.addEventListener('change', function(e) {
                let fileName = e.target.files[0]?.name || 'Pilih file...';
                e.target.nextElementSibling.innerText = fileName;
            });
        });
    </script>
@endsection
