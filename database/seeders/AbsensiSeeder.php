<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua id mahasiswa dan matakuliah
        $mahasiswaIds = Mahasiswa::pluck('id')->toArray();
        $matakuliahIds = Matakuliah::pluck('id')->toArray();

        // Buat 20 data absensi
        for ($i = 0; $i < 20; $i++) {
            Absensi::create([
                'mahasiswa_id' => $mahasiswaIds[array_rand($mahasiswaIds)],
                'matakuliah_id' => $matakuliahIds[array_rand($matakuliahIds)],
                'tanggal' => now()->subDays(rand(0, 30))->toDateString(),
                'jam' => now()->format('H:i:s'),
                'status' => ['Hadir', 'Izin', 'Sakit', 'Alpha'][rand(0, 3)],
            ]);
        }
    }
}
