@extends('backend.layouts.app')

@section('title', 'Tiga Program Unggulan')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill mr-1"></i> {{ session('success') }}
        </div>
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

    <form action="{{ route('tigaprogram.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Video YouTube -->
            <div class="col-md-6" data-aos="fade-right">
                <div class="form-group">
                    <label for="youtube">Link Youtube</label>
                    <input class="form-control" id="youtube" name="youtube" type="text" value="{{ old('youtube', $data->youtube ?? '') }}">
                </div>
                <div class="embed-responsive embed-responsive-16by9 rounded">
                    <iframe allowfullscreen class="embed-responsive-item rounded" src="{{ old('youtube', $data->youtube ?? 'https://www.youtube.com/embed/9hQ3s4b9rl4') }}" title="YouTube video"></iframe>
                </div>
            </div>

            <!-- Keunggulan SMP -->
            <div class="col-md-6" data-aos="fade-left">
                <div class="h-100 p-3">
                    <!-- Keunggulan 1 -->
                    <div class="d-flex align-items-start mb-4">
                        <i class="bi {{ old('icon1', $data->icon1 ?? 'bi-person-check-fill') }} h4 text-warning mr-3"></i>
                        <div class="flex-grow-1">
                            <label for="judul1">Nama Keunggulan 1</label>
                            <input class="form-control mb-2" id="judul1" name="judul1" type="text" value="{{ old('judul1', $data->judul1 ?? '') }}">
                            <label for="deskripsi1">Penjelasan Keunggulan 1</label>
                            <textarea class="form-control mb-2" id="deskripsi1" name="deskripsi1" rows="3">{{ old('deskripsi1', $data->deskripsi1 ?? '') }}</textarea>
                            <input class="form-control" name="icon1" placeholder="Icon Bootstrap (bi bi-...)" type="text" value="{{ old('icon1', $data->icon1 ?? '') }}">

                            <div class="bg-danger my-3 rounded p-2 text-white">
                                <small>Contoh:</small><br>
                                <small>Tenaga pendidik dan kependidikan di SMK Muhammadiyah Tumijajar merupakan lulusan-lulusan terbaik dari berbagai Universitas ternama di Indonesia. Selalu menjadi perwakilan di berbagai Diklat lokal maupun Nasional.</small>
                            </div>
                        </div>
                    </div>

                    <!-- Keunggulan 2 -->
                    <div class="d-flex align-items-start mb-4">
                        <i class="bi {{ old('icon2', $data->icon2 ?? 'bi-building') }} h4 text-info mr-3"></i>
                        <div class="flex-grow-1">
                            <label for="judul2">Nama Keunggulan 2</label>
                            <input class="form-control mb-2" id="judul2" name="judul2" type="text" value="{{ old('judul2', $data->judul2 ?? '') }}">
                            <label for="deskripsi2">Penjelasan Keunggulan 2</label>
                            <textarea class="form-control mb-2" id="deskripsi2" name="deskripsi2" rows="3">{{ old('deskripsi2', $data->deskripsi2 ?? '') }}</textarea>
                            <input class="form-control" name="icon2" placeholder="Icon Bootstrap (bi bi-...)" type="text" value="{{ old('icon2', $data->icon2 ?? '') }}">

                            <div class="bg-danger my-3 rounded p-2 text-white">
                                <small>Contoh:</small><br>
                                <small>Mendapat program Revitalisasi Nasional, memperoleh program Center of Excellence berupa gedung dan perangkatnya, berbagai TeFA dari semua jurusan yang bersaing level Nasional.</small>
                            </div>
                        </div>
                    </div>

                    <!-- Keunggulan 3 -->
                    <div class="d-flex align-items-start mb-4">
                        <i class="bi {{ old('icon3', $data->icon3 ?? 'bi-stars') }} h4 text-success mr-3"></i>
                        <div class="flex-grow-1">
                            <label for="judul3">Nama Keunggulan 3</label>
                            <input class="form-control mb-2" id="judul3" name="judul3" type="text" value="{{ old('judul3', $data->judul3 ?? '') }}">
                            <label for="deskripsi3">Penjelasan Keunggulan 3</label>
                            <textarea class="form-control mb-2" id="deskripsi3" name="deskripsi3" rows="3">{{ old('deskripsi3', $data->deskripsi3 ?? '') }}</textarea>
                            <input class="form-control" name="icon3" placeholder="Icon Bootstrap (bi bi-...)" type="text" value="{{ old('icon3', $data->icon3 ?? '') }}">

                            <div class="bg-danger my-3 rounded p-2 text-white">
                                <small>Contoh:</small><br>
                                <small>80% lulusan bekerja sesuai bidang, 15% berwirausaha, 5% kuliah. Kualitas siswa jadi prioritas utama.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol simpan -->
        <div class="mt-4">
            <button class="btn btn-primary" type="submit">
                Simpan
            </button>
        </div>
    </form>
@endsection
