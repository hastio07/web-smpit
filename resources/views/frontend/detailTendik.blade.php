@extends('frontend.layouts.app')

@section('title', 'Detail Guru & Tendik')

@section('content')
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <img alt="{{ $tendik->nama_lengkap }}" class="img-fluid rounded shadow" src="{{ asset('storage/' . $tendik->foto) }}">
            </div>
            <div class="col-md-8">
                <h2>{{ $tendik->nama_lengkap }}</h2>
                <table class="table-borderless table">
                    <tr>
                        <th>Jenis PTK</th>
                        <td>: {{ implode(', ', $tendik->jenis_ptk ?? []) }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>: {{ $tendik->jabatan }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>: {{ $tendik->status_kepegawaian }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan</th>
                        <td>: {{ $tendik->pendidikan_terakhir }}</td>
                    </tr>
                    <tr>
                        <th>Mapel</th>
                        <td>: {{ $tendik->mapel->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: {{ $tendik->email }}</td>
                    </tr>
                    <tr>
                        <th>HP</th>
                        <td>: {{ $tendik->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>NIP</th>
                        <td>: {{ $tendik->nip }}</td>
                    </tr>
                    <tr>
                        <th>NUPTK</th>
                        <td>: {{ $tendik->nuptk }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
