<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mhs.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mhs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mhs.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mhs.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mhs.index')->with('success', 'Mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mhs.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
