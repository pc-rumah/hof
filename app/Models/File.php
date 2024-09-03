<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'judul',
        'kategori_file_id',
        'thumbnail',
        'file_path',
        'deskripsi',
    ];

    // Relasi ke model KategoriFile
    public function kategoriFile()
    {
        return $this->belongsTo(KategoriFile::class, 'kategori_file_id');
    }

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
