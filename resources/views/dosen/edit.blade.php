@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Edit Data Dosen</h3>
        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $dosen->nama }}">
            </div>
            <div class="mb-3">
                <label>NIDN</label>
                <input type="text" name="nidn" class="form-control" value="{{ $dosen->nidn }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection

