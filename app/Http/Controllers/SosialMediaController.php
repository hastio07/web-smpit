<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SosialMedia;

class SosialMediaController extends Controller
{
    public function index()
    {
        $sosmed = SosialMedia::all();
        return view('backend.daftarSosmed', compact('sosmed'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|unique:sosial_media,platform',
            'nama' => 'required',
            'link' => 'required|url',
        ]);

        SosialMedia::create([
            'platform' => $request->platform,
            'nama' => $request->nama,
            'link' => $request->link,
        ]);

        return redirect()->back()->with('success', 'Sosial media berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        SosialMedia::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function edit($id)
    {
        $sosmed = \App\Models\SosialMedia::all(); // Ambil semua data untuk ditampilkan di tabel
        $editItem = \App\Models\SosialMedia::findOrFail($id); // Data yang akan diedit

        return view('backend.daftarSosmed', compact('sosmed', 'editItem'));
    }

    public function update(Request $request, $id)
    {
        $sosmed = SosialMedia::findOrFail($id);

        $request->validate([
            'platform' => 'required|unique:sosial_media,platform,' . $sosmed->id,
            'nama' => 'required',
            'link' => 'required|url',
        ]);

        $sosmed->update([
            'platform' => $request->platform,
            'nama' => $request->nama,
            'link' => $request->link,
        ]);

        return redirect()->route('sosialmedia.index')->with('success', 'Data berhasil diperbarui.');
    }
}
