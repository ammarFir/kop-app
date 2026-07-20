<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@kop.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'is_active' => true,
        ]);

        // Buat 1 FO Contoh
        User::create([
            'name' => 'FO Ahmad',
            'email' => 'fo@kop.com',
            'password' => Hash::make('password'),
            'role' => 'fo',
            'is_active' => true,
        ]);

        // Buat 1 Anggota Contoh
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'password' => Hash::make('password'),
            'role' => 'anggota',
            'no_anggota' => 'KOP-0001',
            'nik' => '1234567890123456',
            'alamat' => 'Jl. Mawar No. 1, Jakarta',
            'no_telepon' => '081234567890',
            'is_active' => true,
        ]);
    }
}
