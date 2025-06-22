<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{
    use HasFactory;

    // Jika nama tabel bukan jamak, misal 'sosial_media', bisa dideklarasikan (opsional karena Laravel bisa deteksi)
    protected $table = 'sosial_media';

    // Daftar kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'platform', // misalnya: Instagram, Facebook
        'nama', // nama akun: @smpit.binainsani
        'link', // link akun
    ];
}
