<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create(['nama_kategori' => 'Pakaian']);
        Kategori::create(['nama_kategori' => 'Elektronik']);
        Kategori::create(['nama_kategori' => 'Lingkungan']);
        Kategori::create(['nama_kategori' => 'Hewan']);
        Kategori::create(['nama_kategori' => 'Otomotif']);
        Kategori::create(['nama_kategori' => 'Buah dan Sayur']);
    }
}
