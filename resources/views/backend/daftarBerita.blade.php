@extends('backend.layouts.app')

@section('title', 'Daftar Berita')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Upload Berita</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button aria-label="Tutup" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <button class="btn btn-info mb-3" id="btnToggleForm">
        <i class="fas {{ isset($berita) ? 'fa-times-circle' : 'fa-plus-circle' }}"></i>
        {{ isset($berita) ? 'Tutup Form' : 'Tambah Berita / Kategori' }}
    </button>

    <div class="row" id="formContainer" style="{{ isset($berita) ? '' : 'display: none;' }}">
        {{-- Form Berita --}}
        <div class="col-lg-8">
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary m-0">
                        {{ isset($berita) ? 'Edit Berita' : 'Form Berita' }}
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($berita) ? route('berita.update', $berita->id) : route('berita.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @isset($berita)
                            @method('PUT')
                        @endisset

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input class="form-control" id="judul" name="judul" required type="text" value="{{ old('judul', $berita->judul ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <textarea class="form-control" id="isi" name="isi" rows="8">{{ old('isi', $berita->konten ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar (opsional)</label>
                            <small class="form-text bg-danger d-inline-block rounded bg-opacity-50 px-2 py-1 text-white">
                                <i class="fas fa-exclamation-circle mr-1"></i> Format diperbolehkan: .jpg, .jpeg, .png Maksimal 2MB
                            </small>
                            <input class="form-control" id="gambar" name="gambar" type="file">
                            @isset($berita->file)
                                <div class="mt-2">
                                    <img class="img-thumbnail" src="{{ asset('storage/' . $berita->file) }}" width="120">
                                </div>
                            @endisset
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoriList as $kategori)
                                    <option {{ old('kategori', $berita->kategori_id ?? '') == $kategori->id ? 'selected' : '' }} value="{{ $kategori->id }}">
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary" type="submit">
                            {{ isset($berita) ? 'Update Berita' : 'Upload Berita' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Form Kategori --}}
        <div class="col-lg-4">
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-success m-0">Tambah Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label>
                            <input class="form-control" id="kategori" name="kategori" required type="text">
                        </div>
                        <button class="btn btn-success mt-2" type="submit">Simpan Kategori</button>
                    </form>

                    <hr>
                    <h6 class="font-weight-bold text-secondary">Daftar Kategori</h6>
                    <ul class="list-group">
                        @foreach ($kategoriList as $kategori)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $kategori->nama }}
                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Daftar Berita --}}
    <div class="card mb-4 shadow">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary m-0">Daftar Berita</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered table" id="table-berita" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Isi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beritaList as $i => $item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kategori->nama ?? '-' }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->konten), 100) }}</td>
                                <td>
                                    @if ($item->file)
                                        <img class="img-thumbnail" src="{{ asset('storage/' . $item->file) }}" width="60">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-warning" href="{{ route('berita.edit', $item->id) }}" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="7">Belum ada berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- TinyMCE -->
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#isi',
            plugins: 'lists link image preview code table',
            toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code preview',
            menubar: false,
            height: 300
        });
    </script>

    <!-- DataTables & UI Handling -->
    <script>
        $(function() {
            // 🟢 Inisialisasi DataTables
            $('#table-berita').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    zeroRecords: "Tidak ditemukan data yang cocok",
                    info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                    infoEmpty: "Tidak ada data tersedia",
                    infoFiltered: "(difilter dari _MAX_ total entri)",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                }
            });

            // 🟡 Toggle Form Tambah/Edit
            const $formContainer = $('#formContainer');
            const $btnToggle = $('#btnToggleForm');
            $btnToggle.on('click', function() {
                $formContainer.slideToggle();
                const isVisible = $formContainer.is(':visible');
                $(this).html(isVisible ?
                    '<i class="fas fa-times-circle"></i> Tutup Form' :
                    '<i class="fas fa-plus-circle"></i> Tambah Berita / Kategori'
                );
            });

            // 🔵 Otomatis tampilkan form jika sedang mode edit
            if (new URLSearchParams(window.location.search).get('edit') === 'true') {
                $formContainer.show();
                $btnToggle.html('<i class="fas fa-times-circle"></i> Tutup Form');
                $('html, body').animate({
                    scrollTop: $formContainer.offset().top - 100
                }, 600);
            }

            // 🟣 Preview Gambar Baru Saat Upload
            const gambarInput = document.getElementById('gambar');
            if (gambarInput) {
                gambarInput.addEventListener('change', function(e) {
                    const file = this.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            let preview = gambarInput.closest('.form-group').querySelector('img.img-thumbnail');
                            if (!preview) {
                                preview = document.createElement('img');
                                preview.className = 'img-thumbnail mt-2';
                                preview.width = 120;
                                gambarInput.closest('.form-group').appendChild(preview);
                            }
                            preview.src = event.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // 🔘 Auto-hide alert sukses
            setTimeout(() => $('.alert-success').fadeOut('slow'), 3000);
        });
    </script>
@endpush
