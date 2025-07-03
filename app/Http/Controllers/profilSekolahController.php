<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\Storage;

class profilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        return view('backend.profilSekolah', compact('profil'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string',
            'slogan' => 'nullable|string',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string',
            'wa' => 'nullable|string',
            'email' => 'nullable|email',
            'maps' => 'nullable|string',
            'logo_smpit' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo_jsit' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo_yayasan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo_kota' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profil = ProfilSekolah::first() ?? new ProfilSekolah();

        // Logo replacement
        foreach (['logo_smpit', 'logo_jsit', 'logo_yayasan', 'logo_kota'] as $logo) {
            if ($request->hasFile($logo)) {
                if ($profil->$logo && Storage::disk('public')->exists($profil->$logo)) {
                    Storage::disk('public')->delete($profil->$logo);
                }
                $profil->$logo = $request->file($logo)->store('logo', 'public');
            }
        }

        // Text data
        $profil->fill($request->except(['_token', 'logo_smpit', 'logo_jsit', 'logo_yayasan', 'logo_kota']));
        $profil->save();

        return redirect()->route('profilsekolah.index')->with('success', 'Profil Sekolah berhasil diperbarui.');
    }
}
