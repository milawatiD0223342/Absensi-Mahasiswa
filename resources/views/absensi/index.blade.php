@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Absensi</h1>

    <a href="{{ route('absensi.create') }}" class="btn btn-primary mb-3">Tambah Absensi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Mahasiswa</th>
                <th>Matakuliah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($absensis as $absensi)
                <tr>
                    <td>{{ $absensi->tanggal }}</td>
                    <td>{{ $absensi->jam }}</td>
                    <td>{{ $absensi->mahasiswa->nama }}</td>
                    <td>{{ $absensi->matakuliah->nama }}</td>
                    <td>{{ $absensi->status }}</td>
                    <td>
                        <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Belum ada data absensi.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
