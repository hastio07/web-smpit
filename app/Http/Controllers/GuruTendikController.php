<?php

namespace App\Http\Controllers;

use App\Models\GuruTendik;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruTendikController extends Controller
{
    public function daftarTendikFrontend()
    {
        $data = \App\Models\GuruTendik::with('mapel')->latest()->get();
        return view('frontend.tendik', compact('data'));
    }

    public function index()
    {
        $data = GuruTendik::with('mapel')->latest()->get();
        $mapelList = Mapel::all();
        return view('backend.daftarTendik', compact('data', 'mapelList'));
    }

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

    public function edit($id)
    {
        $edit = GuruTendik::findOrFail($id);
        $data = GuruTendik::with('mapel')->latest()->get();
        $mapelList = Mapel::all();
        return view('backend.daftarTendik', compact('edit', 'data', 'mapelList'));
    }

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
