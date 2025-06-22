<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilKepsek;
use Illuminate\Support\Facades\Storage;

class ProfilKepsekController extends Controller
{
    // Menampilkan form
    public function index()
    {
        $profil = ProfilKepsek::first(); // hanya satu data
        return view('backend.profilKepsek', compact('profil'));
    }

    // Menyimpan atau memperbarui profil
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'sambutan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profil = ProfilKepsek::first();

        if (!$profil) {
            $profil = new ProfilKepsek();
        }

        // Jika ada foto baru, hapus yang lama
        if ($request->hasFile('foto')) {
            if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
                Storage::disk('public')->delete($profil->foto);
            }

            $path = $request->file('foto')->store('kepala-sekolah', 'public');
            $profil->foto = $path;
        }

        $profil->nama = $request->nama;
        $profil->jabatan = $request->jabatan;
        $profil->sambutan = $request->sambutan;
        $profil->save();

        return redirect()->route('profilkepsek.index')->with('success', 'Profil berhasil disimpan.');
    }
}
