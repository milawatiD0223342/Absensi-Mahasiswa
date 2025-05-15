@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mhs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" id="nim" value="{{ old('nim') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mhs.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
