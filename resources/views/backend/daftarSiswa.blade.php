@extends('backend.layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Daftar Siswa</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button aria-label="Tutup" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <button class="btn btn-info mb-3" id="toggleFormBtn">
        <i class="fas fa-plus-circle"></i> Tambah Siswa
    </button>

    <div class="card mb-4 shadow" id="formTambahSiswa" style="display: none;">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary m-0">Form Tambah Siswa</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nama</label>
                        <input class="form-control" name="nama" required type="text">
                    </div>
                    <div class="form-group col-md-4">
                        <label>NIS</label>
                        <input class="form-control" name="nis" required type="text">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" required>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Nomor HP</label>
                        <input class="form-control" name="nomor_hp" required type="text">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input class="form-control" name="email" required type="email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama Ayah</label>
                        <input class="form-control" name="nama_ayah" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Ibu</label>
                        <input class="form-control" name="nama_ibu" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" required rows="2"></textarea>
                </div>

                <div class="form-group">
                    <label>Foto Siswa</label>
                    <small class="form-text bg-danger d-inline-block rounded bg-opacity-50 px-2 py-1 text-white">
                        <i class="fas fa-exclamation-circle mr-1"></i> Format diperbolehkan: .jpg, .jpeg, .png Maksimal 2MB
                    </small>
                    <input accept="image/*" class="form-control" id="foto" name="foto" type="file">
                    <img class="img-thumbnail d-none mt-2" id="preview-foto" style="max-height: 150px;">
                </div>

                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <div class="card mb-4 shadow">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary m-0">Data Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered table" id="table-siswa" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Orang Tua</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $i => $row)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->nis }}</td>
                                <td>{{ $row->kelas }}</td>
                                <td>{{ ucfirst($row->status) }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->nomor_hp }}</td>
                                <td>{{ $row->nama_ayah ?? '-' }} / {{ $row->nama_ibu ?? '-' }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>
                                    @if ($row->foto)
                                        <img class="img-thumbnail" src="{{ asset('storage/' . $row->foto) }}" width="60">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn btn-warning" href="{{ route('siswa.edit', $row->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('siswa.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="11">Belum ada data siswa.</td>
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
        $(function() {
            // Toggle Form
            $('#toggleFormBtn').on('click', function() {
                $('#formTambahSiswa').slideToggle();
            });

            // DataTable
            $('#table-siswa').DataTable({
                responsive: true,
                autoWidth: false
            });

            // Preview Foto
            $('#foto').on('change', function() {
                const [file] = this.files;
                const preview = document.getElementById('preview-foto');
                if (file) {
                    preview.src = URL.createObjectURL(file);
                    preview.classList.remove('d-none');
                }
            });

            // Reset preview jika file dihapus
            $('#foto').on('input', function() {
                const preview = $('#preview-foto');
                if (!this.value) {
                    preview.addClass('d-none').attr('src', '');
                }
            });

            // Auto-hide alert sukses
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 3000);
        });
    </script>
@endpush
