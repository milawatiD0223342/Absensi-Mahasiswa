@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Matakuliah</h1>

    <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ old('kode', $matakuliah->kode) }}" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $matakuliah->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen Pengampu</label>
            <select name="dosen_id" class="form-control" required>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}" {{ $dosen->id == $matakuliah->dosen_id ? 'selected' : '' }}>
                        {{ $dosen->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
