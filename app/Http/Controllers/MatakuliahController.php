<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::with('dosen')->get();
        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('matakuliah.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliahs,kode',
            'nama' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $dosens = Dosen::all();
        return view('matakuliah.edit', compact('matakuliah', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);

        $request->validate([
            'kode' => 'required|unique:matakuliahs,kode,' . $matakuliah->id,
            'nama' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil dihapus!');
    }
}
