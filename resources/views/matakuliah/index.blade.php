@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Matakuliah</h1>

    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">Tambah Matakuliah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Dosen Pengampu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($matakuliahs as $matakuliah)
                <tr>
                    <td>{{ $matakuliah->kode }}</td>
                    <td>{{ $matakuliah->nama }}</td>
                    <td>{{ $matakuliah->dosen->nama }}</td>
                    <td>
                        <a href="{{ route('matakuliah.edit', $matakuliah->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('matakuliah.destroy', $matakuliah->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data matakuliah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
