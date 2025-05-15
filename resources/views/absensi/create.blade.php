@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Absensi</h1>

    <form method="POST" action="{{ route('absensi.store') }}">
        @csrf

        <div class="mb-3">
            <label>Mahasiswa</label>
            <select name="mahasiswa_id" class="form-control" required>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($mahasiswas as $mhs)
                    <option value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Matakuliah</label>
            <select name="matakuliah_id" class="form-control" required>
                <option value="">-- Pilih Matakuliah --</option>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jam</label>
            <input type="time" name="jam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpha">Alpha</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
