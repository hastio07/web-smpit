<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilSekolahTable extends Migration
{
    public function up()
    {
        Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah')->nullable();
            $table->text('slogan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('wa')->nullable();
            $table->string('email')->nullable();
            $table->text('maps')->nullable();

            // Logo-logo
            $table->string('logo_smpit')->nullable();
            $table->string('logo_jsit')->nullable();
            $table->string('logo_yayasan')->nullable();
            $table->string('logo_kota')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profil_sekolah');
    }
}
