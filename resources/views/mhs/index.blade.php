@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Mahasiswa</h1>

    <a href="{{ route('mhs.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswas as $index => $mahasiswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>
                        <a href="{{ route('mhs.edit', $mahasiswa->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('mhs.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
