@extends('backend.layouts.app')

@section('title', 'Form Data Kelas & Rombel')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Form Data Kelas & Rombel</h1>

        <div class="card mb-4 shadow">
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="tingkat">Tingkat</label>
                            <select class="form-control" id="tingkat">
                                <option disabled selected>Pilih Tingkat</option>
                                <option value="7">Kelas 7</option>
                                <option value="8">Kelas 8</option>
                                <option value="9">Kelas 9</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input class="form-control" id="nama_kelas" placeholder="Contoh: 7A, 8C" type="text">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="wali_kelas">Wali Kelas</label>
                            <input class="form-control" id="wali_kelas" placeholder="Contoh: Ust. Ahmad" type="text">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ruang">Ruangan</label>
                            <input class="form-control" id="ruang" placeholder="Contoh: Lantai 2 - Kelas 7A" type="text">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="jumlah_siswa">Jumlah Siswa</label>
                            <input class="form-control" id="jumlah_siswa" placeholder="Contoh: 28" type="number">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tahun_ajaran">Tahun Ajaran</label>
                            <input class="form-control" id="tahun_ajaran" placeholder="Contoh: 2024/2025" type="text">
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
