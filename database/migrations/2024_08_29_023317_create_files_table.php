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
        Schema::create('file', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relasi ke tabel users
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('kategori_file_id');
            $table->string('file_path'); // Menyimpan path atau nama file
            $table->string('thumbnail')->nullable(); // Thumbnail file jika diperlukan
            $table->timestamps();

            $table->foreign('kategori_file_id')->references('id')->on('kategori_file')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file');
    }
};
