<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTendikTable extends Migration
{
    public function up()
    {
        Schema::create('guru_tendik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->json('jenis_ptk'); // bisa lebih dari satu
            $table->string('nip')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('status_kepegawaian');
            $table->string('pendidikan_terakhir');
            $table->unsignedBigInteger('mapel_id')->nullable(); // relasi ke tabel mapel
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('guru_tendik');
    }
}
