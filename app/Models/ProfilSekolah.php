<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $table = 'profil_sekolah';

    protected $fillable = ['nama_sekolah', 'slogan', 'alamat', 'telepon', 'wa', 'email', 'maps', 'logo_smpit', 'logo_jsit', 'logo_yayasan', 'logo_kota'];
}
