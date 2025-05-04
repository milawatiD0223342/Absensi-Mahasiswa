<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Dosen Satu',
            'email' => 'dosen1@mail.com',
            'password' => Hash::make('password'),
            'role' => 'dosen',
        ]);

        User::create([
            'name' => 'Mahasiswa Satu',
            'email' => 'mhs1@mail.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
    }
}

