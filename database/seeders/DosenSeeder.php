<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosens')->insert([
            [
                'nama' => 'Dr. Ahmad Fauzi',
                'nidn' => '12345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Prof. Siti Aminah',
                'nidn' => '87654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso, M.Kom',
                'nidn' => '11223344',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
