<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TigaProgram;

class TigaProgramController extends Controller
{
    public function index()
    {
        $data = TigaProgram::first(); // hanya ambil satu baris
        return view('backend.tigaProgram', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'youtube' => 'required|url',
            'judul1' => 'required|string|max:255',
            'deskripsi1' => 'required|string',
            'icon1' => 'required|string|max:100',
            'judul2' => 'required|string|max:255',
            'deskripsi2' => 'required|string',
            'icon2' => 'required|string|max:100',
            'judul3' => 'required|string|max:255',
            'deskripsi3' => 'required|string',
            'icon3' => 'required|string|max:100',
        ]);

        $youtube = $request->input('youtube');
        if (strpos($youtube, 'watch?v=') !== false) {
            $youtube = str_replace('watch?v=', 'embed/', $youtube);
        }

        TigaProgram::updateOrCreate(
            ['id' => 1],
            [
                'youtube' => $youtube,
                'judul1' => $request->judul1,
                'deskripsi1' => $request->deskripsi1,
                'icon1' => $request->icon1,
                'judul2' => $request->judul2,
                'deskripsi2' => $request->deskripsi2,
                'icon2' => $request->icon2,
                'judul3' => $request->judul3,
                'deskripsi3' => $request->deskripsi3,
                'icon3' => $request->icon3,
            ],
        );

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
