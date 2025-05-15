@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Absensi</h1>

    <form method="POST" action="{{ route('absensi.update', $absensi->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Mahasiswa</label>
            <select name="mahasiswa_id" class="form-control" required>
                @foreach($mahasiswas as $mhs)
                    <option value="{{ $mhs->id }}" {{ $absensi->mahasiswa_id == $mhs->id ? 'selected' : '' }}>
                        {{ $mhs->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Matakuliah</label>
            <select name="matakuliah_id" class="form-control" required>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->id }}" {{ $absensi->matakuliah_id == $mk->id ? 'selected' : '' }}>
                        {{ $mk->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $absensi->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Jam</label>
            <input type="time" name="jam" class="form-control" value="{{ $absensi->jam }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                @foreach(['Hadir', 'Izin', 'Sakit', 'Alpha'] as $status)
                    <option value="{{ $status }}" {{ $absensi->status == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
