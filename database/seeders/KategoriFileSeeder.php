<?php

namespace Database\Seeders;

use App\Models\KategoriFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriFile::create(['nama_kategori_file' => 'Aplikasi']);
        KategoriFile::create(['nama_kategori_file' => 'Game']);
        KategoriFile::create(['nama_kategori_file' => 'PDF']);
        KategoriFile::create(['nama_kategori_file' => 'Word']);
        KategoriFile::create(['nama_kategori_file' => 'Excel']);
        KategoriFile::create(['nama_kategori_file' => 'PPT']);
    }
}
