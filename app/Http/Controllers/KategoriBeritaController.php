<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;

class KategoriBeritaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|unique:kategori_berita,nama',
        ]);

        KategoriBerita::create(['nama' => $request->kategori]);

        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        KategoriBerita::findOrFail($id)->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
