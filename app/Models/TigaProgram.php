<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TigaProgram extends Model
{
    protected $table = 'tigaprogram';

    protected $fillable = ['youtube', 'judul1', 'deskripsi1', 'icon1', 'judul2', 'deskripsi2', 'icon2', 'judul3', 'deskripsi3', 'icon3'];
}
