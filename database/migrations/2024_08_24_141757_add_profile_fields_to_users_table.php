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
        Schema::table('users', function (Blueprint $table) {
            $table->text('tentang')->nullable()->after('email');
            $table->string('pekerjaan')->nullable()->after('tentang');
            $table->string('negara')->nullable()->after('pekerjaan');
            $table->string('alamat')->nullable()->after('negara');
            $table->string('notelp')->nullable()->after('alamat');
            $table->string('facebook')->nullable()->after('notelp');
            $table->string('instagram')->nullable()->after('facebook');
            $table->string('linkedin')->nullable()->after('instagram');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'tentang',
                'pekerjaan',
                'negara',
                'alamat',
                'notelp',
                'facebook',
                'instagram',
                'linkedin'
            ]);
        });
    }
};
