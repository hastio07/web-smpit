@extends('frontend.layouts.app')

@section('title', 'Daftar Siswa')

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/listSiswa.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container py-5">
        <h2 class="fw-bold mb-4 text-center">Daftar Siswa</h2>

        <!-- Filter dan Search -->
        <div class="row align-items-center justify-content-between mb-4">
            <div class="col-md-6 mb-md-0 mb-2">
                <select class="form-select" id="kelasFilter">
                    <option value="">Semua Kelas</option>
                    @foreach ($kelas as $kls)
                        <option value="{{ $kls }}">{{ $kls }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <input class="form-control" id="searchInput" placeholder="Cari berdasarkan nama..." type="text">
            </div>
        </div>

        <!-- Tabel Siswa -->
        <div class="table-responsive">
            <table class="minimalist-table mb-0 table align-middle" id="siswaTable">
                <thead class="">
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $row)
                        <tr>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->kelas }}</td>
                            <td class="">
                                <a class="btn btn-sm" href="{{ route('siswa.show', $row->id) }}">Lihat Profil</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="3">Belum ada data siswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const kelasFilter = document.getElementById('kelasFilter');
            const rows = document.querySelectorAll('#siswaTable tbody tr');

            function filterTable() {
                const searchValue = searchInput.value.toLowerCase();
                const kelasValue = kelasFilter.value;

                rows.forEach(row => {
                    const nama = row.children[0].textContent.toLowerCase();
                    const kelas = row.children[1].textContent;

                    const matchNama = nama.includes(searchValue);
                    const matchKelas = kelasValue === "" || kelas === kelasValue;

                    if (matchNama && matchKelas) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            }

            searchInput.addEventListener('input', filterTable);
            kelasFilter.addEventListener('change', filterTable);
        });
    </script>
@endpush
