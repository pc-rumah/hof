<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidio extends Model
{
    use HasFactory;

    protected $table = 'vidio';

    protected $fillable = [
        'judul',
        'deskripsi',
        'durasi',
        'thumbnail',
        'video',
        'views',
        'kategori_id', // Gunakan konvensi penamaan Laravel
        'user_id',     // Gunakan konvensi penamaan Laravel
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
