<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::with('user')->get();
        return view('dosen.index', compact('dosens'));
    }

    public function create()
{
    return view('dosen.create'); // tampilkan form tambah dosen
}


    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nidn' => 'required|unique:dosens,nidn',
    ]);

    Dosen::create([
        'nama' => $request->nama,
        'nidn' => $request->nidn,
    ]);

    return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan');
}

public function edit($id)
{
    $dosen = Dosen::findOrFail($id);
    return view('dosen.edit', compact('dosen'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'nidn' => 'required',
    ]);

    $dosen = \App\Models\Dosen::findOrFail($id);
    $dosen->update([
        'nama' => $request->nama,
        'nidn' => $request->nidn,
    ]);

    return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diupdate.');
}


public function destroy($id)
{
    $dosen = Dosen::findOrFail($id);
    $dosen->delete();

    return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
}
}

// Budi Santoso, M.Kom
// 11223344
