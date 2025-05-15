<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with(['mahasiswa', 'matakuliah'])->orderByDesc('tanggal')->get();
        return view('absensi.index', compact('absensis'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        return view('absensi.create', compact('mahasiswas', 'matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        return view('absensi.edit', compact('absensi', 'mahasiswas', 'matakuliahs'));
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus.');
    }
}
