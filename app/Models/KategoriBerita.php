<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    protected $table = 'kategori_berita'; // Nama tabel di database

    protected $fillable = ['nama']; // Kolom yang boleh diisi secara massal (mass assignment)

    // Relasi: satu kategori punya banyak berita
    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }
}
