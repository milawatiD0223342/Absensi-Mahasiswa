<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'nama' => 'Andi Pratama',
                'nim' => '21010001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rina Agustina',
                'nim' => '21010002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Fajar Hidayat',
                'nim' => '21010003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
