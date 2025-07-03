@extends('backend.layouts.app')

@section('title', 'Guru & Tendik')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Guru & Tendik</h1>

        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tombol toggle tampilkan form --}}
        @if (!isset($edit))
            <button class="btn btn-primary mb-3" id="btnToggleForm">
                <i class="fas fa-plus"></i> Tambah Guru & Tendik
            </button>
        @endif

        {{-- FORM --}}
        <div class="card mb-4 shadow" id="formInput" style="{{ isset($edit) ? '' : 'display: none;' }}">
            <div class="card-body">
                <form action="{{ isset($edit) ? route('guru.tendik.update', $edit->id) : route('guru.tendik.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if (isset($edit))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control" name="nama_lengkap" required type="text" value="{{ old('nama_lengkap', $edit->nama_lengkap ?? '') }}">
                    </div>

                    {{-- Jenis PTK (checkbox) --}}
                    <div class="form-group">
                        <label>Jenis PTK</label>
                        <div class="row">
                            @php
                                $jenisList = ['Guru Tahta', 'Guru Bahasa Indonesia', 'Guru Pendidikan Agama', 'Guru Matematika', 'Guru PPKn', 'Guru Bahasa Inggris', 'Guru Seni Budaya', 'Guru IPA', 'Guru PJOK', 'Guru IPS', 'Guru Bahasa Arab', 'Guru Pendidikan Anti Korupsi', 'Guru Bahasa Lampung', 'Guru Informatika', 'Guru Prakarya', 'Kepala Sekolah', 'Wakil Kepala Sekolah', 'Wali Kelas', 'Operator Sekolah', 'Tenaga Administrasi', 'Bendahara', 'OB / Penjaga Sekolah'];
                                $selectedPTK = old('jenis_ptk', $edit->jenis_ptk ?? []);
                            @endphp

                            @foreach ($jenisList as $jenis)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input {{ is_array($selectedPTK) && in_array($jenis, $selectedPTK) ? 'checked' : '' }} class="form-check-input" name="jenis_ptk[]" type="checkbox" value="{{ $jenis }}">
                                        <label class="form-check-label">{{ $jenis }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>NIP/NIY</label>
                            <input class="form-control" name="nip" type="text" value="{{ old('nip', $edit->nip ?? '') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>NUPTK</label>
                            <input class="form-control" name="nuptk" type="text" value="{{ old('nuptk', $edit->nuptk ?? '') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Jabatan</label>
                            <input class="form-control" name="jabatan" type="text" value="{{ old('jabatan', $edit->jabatan ?? '') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Status Kepegawaian</label>
                            <select class="form-control" name="status_kepegawaian" required>
                                <option disabled selected>Pilih Status</option>
                                @foreach (['Tetap Yayasan', 'Tidak Tetap Yayasan'] as $status)
                                    <option {{ old('status_kepegawaian', $edit->status_kepegawaian ?? '') == $status ? 'selected' : '' }} value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Pendidikan Terakhir</label>
                            <input class="form-control" name="pendidikan_terakhir" type="text" value="{{ old('pendidikan_terakhir', $edit->pendidikan_terakhir ?? '') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Mapel Diampu</label>
                            <select class="form-control" name="mapel_id">
                                <option value="">-- Pilih Mapel --</option>
                                @foreach ($mapelList as $mapel)
                                    <option {{ old('mapel_id', $edit->mapel_id ?? '') == $mapel->id ? 'selected' : '' }} value="{{ $mapel->id }}">
                                        {{ $mapel->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email" value="{{ old('email', $edit->email ?? '') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>No HP / WA</label>
                            <input class="form-control" name="no_hp" type="text" value="{{ old('no_hp', $edit->no_hp ?? '') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <div class="custom-file">
                            <input class="custom-file-input" id="foto" name="foto" type="file">
                            <label class="custom-file-label" for="foto">Pilih foto...</label>
                        </div>
                        <div class="mt-3">
                            <img class="img-thumbnail" id="preview-image" src="{{ isset($edit->foto) ? asset('storage/' . $edit->foto) : '' }}" style="max-width: 120px;">
                        </div>
                    </div>

                    <button class="btn btn-{{ isset($edit) ? 'warning' : 'primary' }}" type="submit">
                        <i class="fas fa-save mr-1"></i> {{ isset($edit) ? 'Update' : 'Simpan' }}
                    </button>
                    @if (isset($edit))
                        <a class="btn btn-secondary ml-2" href="{{ route('guru.tendik.index') }}">Batal</a>
                    @endif
                </form>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="card shadow">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary m-0">Daftar Guru & Tendik</h6>
            </div>
            <div class="card-body table-responsive">
                <table class="table-sm table-bordered table-hover table">
                    <thead class="thead-light">
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis PTK</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Pendidikan</th>
                            <th>Mapel</th>
                            <th>Email</th>
                            <th>HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>
                                    @if ($item->foto)
                                        <img class="img-thumbnail" src="{{ asset('storage/' . $item->foto) }}" style="width: 60px; height: 60px;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>
                                    @foreach ($item->jenis_ptk as $j)
                                        <span class="badge badge-info">{{ $j }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $item->jabatan ?? '-' }}</td>
                                <td>{{ $item->status_kepegawaian }}</td>
                                <td>{{ $item->pendidikan_terakhir }}</td>
                                <td>{{ $item->mapel->nama_mapel ?? '-' }}</td>
                                <td>{{ $item->email ?? '-' }}</td>
                                <td>{{ $item->no_hp ?? '-' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('guru.tendik.edit', $item->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('guru.tendik.destroy', $item->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="10">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Tampilkan preview gambar
        document.getElementById('foto')?.addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview-image').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });

        // Toggle form saat bukan edit
        document.getElementById('btnToggleForm')?.addEventListener('click', function() {
            const formCard = document.getElementById('formInput');
            formCard.style.display = (formCard.style.display === 'none') ? 'block' : 'none';
        });

        // Hilangkan alert setelah 3 detik (3000 ms)
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.classList.add('fade');
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 300); // Hapus elemen setelah animasi
            });
        }, 3000);
    </script>
@endpush
