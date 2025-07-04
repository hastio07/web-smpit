<?php

namespace App\Http\Controllers;

use App\Models\GuruTendik;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruTendikController extends Controller
{
    // ✅ FRONTEND - Detail Guru
    public function show($id)
    {
        $tendik = GuruTendik::with('mapel')->findOrFail($id);
        return view('frontend.detailTendik', compact('tendik'));
    }

    // ✅ FRONTEND - Daftar Guru & Tendik + Pencarian
    public function daftarTendikFrontend(Request $request)
    {
        $query = GuruTendik::with('mapel')->latest();

        if ($request->filled('search')) {
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%');
        }

        $data = $query->get();
        return view('frontend.tendik', compact('data'));
    }

    // ✅ BACKEND - Tampilkan data
    public function index()
    {
        $data = GuruTendik::with('mapel')->latest()->get();
        $mapelList = Mapel::all();
        return view('backend.daftarTendik', compact('data', 'mapelList'));
    }

    // ✅ BACKEND - Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_ptk' => 'required|array',
            'nip' => 'nullable|string|max:100',
            'nuptk' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:255',
            'status_kepegawaian' => 'required|string|max:100',
            'pendidikan_terakhir' => 'required|string|max:100',
            'mapel_id' => 'nullable|exists:mapel,id',
            'email' => 'nullable|email',
            'no_hp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_guru', 'public');
        }

        GuruTendik::create($validated);

        return redirect()->route('guru.tendik.index')->with('success', 'Data guru berhasil disimpan.');
    }

    // ✅ BACKEND - Edit data
    public function edit($id)
    {
        $edit = GuruTendik::findOrFail($id);
        $data = GuruTendik::with('mapel')->latest()->get();
        $mapelList = Mapel::all();
        return view('backend.daftarTendik', compact('edit', 'data', 'mapelList'));
    }

    // ✅ BACKEND - Update data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_ptk' => 'required|array',
            'nip' => 'nullable|string|max:100',
            'nuptk' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:255',
            'status_kepegawaian' => 'required|string|max:100',
            'pendidikan_terakhir' => 'required|string|max:100',
            'mapel_id' => 'nullable|exists:mapel,id',
            'email' => 'nullable|email',
            'no_hp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $guru = GuruTendik::findOrFail($id);

        // Ganti foto jika upload baru
        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto_guru', 'public');
        }

        $guru->update($validated);

        return redirect()->route('guru.tendik.index')->with('success', 'Data berhasil diperbarui.');
    }

    // ✅ BACKEND - Hapus data
    public function destroy($id)
    {
        $guru = GuruTendik::findOrFail($id);

        // Hapus foto dari storage
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->route('guru.tendik.index')->with('success', 'Data berhasil dihapus.');
    }
}
