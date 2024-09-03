<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriFile extends Model
{
    use HasFactory;

    protected $table = 'kategori_file';

    protected $fillable = [
        'nama_kategori_file',
    ];
}
