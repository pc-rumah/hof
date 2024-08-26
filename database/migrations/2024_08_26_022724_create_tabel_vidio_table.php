<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vidio', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi'); // Menggunakan text untuk deskripsi yang lebih panjang
            $table->time('durasi'); // Menggunakan tipe time untuk durasi
            $table->string('thumbnail');
            $table->string('video');
            $table->unsignedBigInteger('views')->default(0);
            $table->dateTime('tanggal_upload'); // Menggunakan dateTime untuk tanggal upload
            $table->foreignId('kategori_id')->constrained('kategori'); // Menggunakan foreignId untuk relasi dengan tabel kategori
            $table->foreignId('user_id')->constrained('users'); // Menggunakan foreignId untuk relasi dengan tabel users
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vidio');
    }
};
