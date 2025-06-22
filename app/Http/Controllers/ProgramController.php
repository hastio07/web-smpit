<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('backend.programUnggulan', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'warna' => 'required|string|max:50',
        ]);

        Program::create($request->only('nama_program', 'icon', 'warna'));

        return redirect()->route('program.index')->with('success', 'Program berhasil ditambahkan!');
    }
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('program.index')->with('success', 'Program berhasil dihapus.');
    }
}
