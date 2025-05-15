<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Mahasiswa;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiDosenController extends Controller
{
    public function create()
    {
        $dosenId = auth()->user()->id; // pastikan user login sebagai dosen
        $matakuliahs = Matakuliah::where('dosen_id', $dosenId)->with('mahasiswas')->get();

        return view('dosen.absensi.create', compact('matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'absen' => 'required|array',
        ]);

        foreach ($request->absen as $mahasiswa_id => $status) {
            Absensi::updateOrCreate(
                [
                    'mahasiswa_id' => $mahasiswa_id,
                    'matakuliah_id' => $request->matakuliah_id,
                    'tanggal' => $request->tanggal,
                ],
                [
                    'jam' => $request->jam,
                    'status' => $status,
                ]
            );
        }

        return redirect()->route('dosen.absensi.create')->with('success', 'Absensi berhasil disimpan.');
    }
}
