@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Input Absensi Mahasiswa oleh Dosen</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('dosen.absensi.store') }}">
        @csrf

        <div class="mb-3">
            <label>Matakuliah</label>
            <select name="matakuliah_id" class="form-select" required onchange="this.form.submit()">
                <option value="">-- Pilih --</option>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->id }}" {{ old('matakuliah_id') == $mk->id ? 'selected' : '' }}>
                        {{ $mk->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        @if(request('matakuliah_id'))
            @php
                $mk = $matakuliahs->where('id', request('matakuliah_id'))->first();
            @endphp

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jam</label>
                <input type="time" name="jam" class="form-control" required>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mk->mahasiswas as $mhs)
                        <tr>
                            <td>{{ $mhs->nama }}</td>
                            <td>
                                <select name="absen[{{ $mhs->id }}]" class="form-select">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Alpha">Alpha</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button class="btn btn-primary">Simpan Absensi</button>
        @endif
    </form>
</div>
@endsection

