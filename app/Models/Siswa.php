<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nis', 'kelas', 'status', 'nomor_hp', 'email', 'nama_ayah', 'nama_ibu', 'alamat', 'foto'];
}
