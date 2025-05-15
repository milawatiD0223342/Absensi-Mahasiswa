@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Matakuliah</h1>

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen Pengampu</label>
            <select name="dosen_id" class="form-control" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
