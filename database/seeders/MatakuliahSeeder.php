<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil salah satu dosen untuk foreign key
        $dosenId = DB::table('dosens')->first()->id;

        DB::table('matakuliahs')->insert([
            [
                'kode' => 'IF101',
                'nama' => 'Pemrograman Dasar',
                'dosen_id' => $dosenId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'IF102',
                'nama' => 'Struktur Data',
                'dosen_id' => $dosenId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'IF103',
                'nama' => 'Basis Data',
                'dosen_id' => $dosenId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
