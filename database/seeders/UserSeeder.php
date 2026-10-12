<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Akun Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'nama' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'member',
                'tgl_daftar' => now(),
            ]
        );

        // Akun User Demo
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'nama' => 'User Demo',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'status' => 'member',
                'tgl_daftar' => now(),
            ]
        );
    }
}
