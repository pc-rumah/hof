<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $pengguna = User::create([
            'name' => 'Pengguna',
            'email' => 'pengguna@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $pengguna->assignRole('pengguna');
    }
}
