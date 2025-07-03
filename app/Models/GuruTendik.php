<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruTendik extends Model
{
    protected $table = 'guru_tendik';

    protected $fillable = ['nama_lengkap', 'jenis_ptk', 'nip', 'nuptk', 'jabatan', 'status_kepegawaian', 'pendidikan_terakhir', 'mapel_id', 'email', 'no_hp', 'foto'];

    protected $casts = [
        'jenis_ptk' => 'array',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
