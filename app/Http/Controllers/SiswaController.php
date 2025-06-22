<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function daftarSiswaFrontend()
    {
        $siswa = Siswa::orderBy('kelas')->get();
        $kelas = Siswa::select('kelas')->distinct()->pluck('kelas');

        return view('frontend.siswa', compact('siswa', 'kelas'));
    }

    public function index()
    {
        $siswa = Siswa::all();

        return view('backend.daftarSiswa', compact('siswa'));
    }
    public function dashboard()
    {
        $jumlahAktif = \App\Models\Siswa::where('status', 'aktif')->count();

        return view('backend.dashboard', compact('jumlahAktif'));
    }

    public function show(Siswa $siswa)
    {
        return view('frontend.detailSiswa', compact('siswa'));
    }

    public function create()
    {
        return view('backend.formSiswa');
    }

    public function store(Request $request)
    {
        $data = $request->only(['nama', 'nis', 'kelas', 'status', 'nomor_hp', 'email', 'nama_ayah', 'nama_ibu', 'alamat', 'foto']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        Siswa::create($data);

        return redirect()->back()->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        return view('backend.formSiswa', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'kelas' => 'required|in:VII,VIII,IX',
            'status' => 'nullable',
            'nomor_hp' => 'nullable',
            'email' => 'nullable|email',
            'nama_ayah' => 'nullable',
            'nama_ibu' => 'nullable',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }

            $validated['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
    }
}
