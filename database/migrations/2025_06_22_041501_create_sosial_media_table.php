<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSosialMediaTable extends Migration
{
    public function up()
    {
        Schema::create('sosial_media', function (Blueprint $table) {
            $table->id();
            $table->string('platform')->unique(); // Facebook, Instagram, dll (UNIK)
            $table->string('nama'); // Nama akun, misal: @bina.insani
            $table->string('link'); // Link profil
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sosial_media');
    }
}
