@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Dosen</h1>
    <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIDN</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dosens as $index => $dosen)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dosen->nama }}</td>
                    <td>{{ $dosen->nidn }}</td>
                    <td>

                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm mb-2 w-50">Edit</a>
                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm w-50">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
