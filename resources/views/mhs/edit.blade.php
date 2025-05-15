@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mhs.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mhs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
