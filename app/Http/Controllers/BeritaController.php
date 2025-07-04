<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // 🧾 Menampilkan daftar & form upload berita di backend
    public function index(Request $request)
    {
        $query = Berita::with('kategori')->latest();

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $beritaList = $query->get();

        return view('frontend.berita', compact('beritaList'));
    }

    // 💾 Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'kategori' => 'required|exists:kategori_berita,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('gambar')) {
            $filePath = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->isi,
            'kategori_id' => $request->kategori,
            'file' => $filePath,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diunggah.');
    }

    // ✏️ Edit berita
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategoriList = KategoriBerita::all();
        $beritaList = Berita::with('kategori')->latest()->get();

        return view('backend.daftarBerita', compact('berita', 'kategoriList', 'beritaList'));
    }

    // 🔁 Update berita
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'kategori' => 'required|exists:kategori_berita,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->file && Storage::disk('public')->exists($berita->file)) {
                Storage::disk('public')->delete($berita->file);
            }
            $path = $request->file('gambar')->store('berita', 'public');
            $berita->file = $path;
        }

        $berita->judul = $request->judul;
        $berita->konten = $request->isi;
        $berita->kategori_id = $request->kategori;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    // 🗑️ Hapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->file && Storage::disk('public')->exists($berita->file)) {
            Storage::disk('public')->delete($berita->file);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    // 🌐 Tampilkan detail berita di frontend
    public function show($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);
        $beritaTerbaru = Berita::where('id', '!=', $id)->latest()->take(3)->get();
        return view('frontend.detailBerita', compact('berita', 'beritaTerbaru'));
    }
    // 🌐 Menampilkan daftar berita di frontend (gambar selang-seling)
    public function daftarBeritaFrontend()
    {
        $beritaList = Berita::with('kategori')->latest()->get();
        return view('frontend.berita', compact('beritaList'));
    }
}
