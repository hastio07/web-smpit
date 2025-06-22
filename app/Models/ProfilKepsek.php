<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilKepsek extends Model
{
    protected $table = 'profil_kepsek';

    protected $fillable = ['nama', 'jabatan', 'sambutan', 'foto'];
}
