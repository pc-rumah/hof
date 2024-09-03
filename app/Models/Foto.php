<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'foto';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'judul',
        'kategori_id',
        'user_id',
        'foto',
        'deskripsi',
    ];



    /**
     * Relasi ke model Kategori
     * Satu foto memiliki satu kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Relasi ke model User
     * Satu foto diupload oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
