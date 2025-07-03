@extends('backend.layouts.app')

@section('title', 'Form Guru & Tendik')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Form Input Guru & Tendik</h1>

        <div class="card mb-4 shadow">
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input class="form-control" id="nama_lengkap" placeholder="Contoh: Ust. Ahmad Fulan" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jenis_ptk">Jenis PTK (Pendidik dan Tenaga Kependidikan)</label>
                            <select class="form-control" id="jenis_ptk">
                                <option disabled selected>Pilih Jenis PTK</option>
                                <option>Guru Tahta</option>
                                <option>Guru Bahasa Indonesia</option>
                                <option>Guru Pendidikan Agama</option>
                                <option>Guru Matematika</option>
                                <option>Guru PPKn</option>
                                <option>Guru Bahasa Inggris</option>
                                <option>Guru Seni Budaya</option>
                                <option>Guru IPA</option>
                                <option>Guru PJOK</option>
                                <option>Guru IPS</option>
                                <option>Guru Bahasa Arab</option>
                                <option>Guru Pendidikan Anti Korupsi</option>
                                <option>Guru Bahasa Lampung</option>
                                <option>Guru Informatika</option>
                                <option>Guru Prakarya</option>

                                {{-- Tenaga Kependidikan --}}
                                <option>Kepala Sekolah</option>
                                <option>Wakil Kepala Sekolah</option>
                                <option>Wali Kelas</option>
                                <option>Operator Sekolah</option>
                                <option>Tenaga Administrasi</option>
                                <option>Bendahara</option>
                                <option>OB / Penjaga Sekolah</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nip">NIP/NIY</label>
                            <input class="form-control" id="nip" placeholder="Kosongkan jika tidak ada" type="text">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nuptk">NUPTK</label>
                            <input class="form-control" id="nuptk" placeholder="Kosongkan jika tidak ada" type="text">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="jabatan">Jabatan</label>
                            <input class="form-control" id="jabatan" placeholder="Contoh: Wali Kelas 7A" type="text">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="status_kepegawaian">Status Kepegawaian</label>
                            <select class="form-control" id="status_kepegawaian">
                                <option disabled selected>Pilih Status</option>
                                <option>Tetap Yayasan</option>
                                <option>Tidak Tetap Yayasan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                            <input class="form-control" id="pendidikan_terakhir" placeholder="Contoh: S1 Pendidikan Islam" type="text">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mapel_diampu">Mapel Diampu</label>
                            <input class="form-control" id="mapel_diampu" placeholder="Contoh: Matematika, Al Qur'an" type="text">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" placeholder="nama@email.com" type="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_hp">No. HP / WA</label>
                            <input class="form-control" id="no_hp" placeholder="08xxxxxxxxxx" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <div class="custom-file">
                            <input class="custom-file-input" id="foto" type="file">
                            <label class="custom-file-label" for="foto">Pilih foto...</label>
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
