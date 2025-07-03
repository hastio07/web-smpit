<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelTable extends Migration
{
    public function up()
    {
        Schema::create('mapel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mapel');
            $table->string('kode_mapel')->nullable(); // opsional
            $table->enum('kelompok', ['Wajib', 'Tambahan', 'Ekstrakurikuler']);
            $table->enum('tingkat', ['Semua Jenjang', 'Kelas 7', 'Kelas 8', 'Kelas 9']);
            $table->enum('kategori_mapel', ['Umum', 'Agama', 'Khusus Sekolah']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mapel');
    }
}
