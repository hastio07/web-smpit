<?php

namespace App\Http\Controllers;

use App\Models\SosialMedia;
use Illuminate\Http\Request;

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

        SosialMedia::create($request->only('platform', 'nama', 'link'));

        return redirect()->route('sosialmedia.index')->with('success', 'Sosial media berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sosmed = SosialMedia::all();
        $editItem = SosialMedia::findOrFail($id);
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

        $sosmed->update($request->only('platform', 'nama', 'link'));

        return redirect()->route('sosialmedia.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        SosialMedia::destroy($id);
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
