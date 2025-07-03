<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $allMapel = Mapel::all();
        return view('backend.daftarMapel', compact('allMapel'));
    }

    public function store(Request $request)
    {
        $this->validateData($request);
        Mapel::create($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $edit = Mapel::findOrFail($id);
        $allMapel = Mapel::all();

        return view('backend.daftarMapel', compact('edit', 'allMapel'));
    }

    public function update(Request $request, $id)
    {
        $this->validateData($request);

        $mapel = Mapel::findOrFail($id);
        $mapel->update($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil dihapus.');
    }

    private function validateData(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'kode_mapel' => 'nullable|string|max:50',
            'kelompok' => 'required|in:Wajib,Tambahan,Ekstrakurikuler',
            'tingkat' => 'required|in:Semua Jenjang,Kelas 7,Kelas 8,Kelas 9',
            'kategori_mapel' => 'required|in:Umum,Agama,Khusus Sekolah',
        ]);
    }
}
