<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tigaprogram', function (Blueprint $table) {
            $table->id();
            $table->string('youtube');

            $table->string('judul1');
            $table->text('deskripsi1');
            $table->string('icon1'); // ✅ Tambahkan ini

            $table->string('judul2');
            $table->text('deskripsi2');
            $table->string('icon2'); // ✅ Tambahkan ini

            $table->string('judul3');
            $table->text('deskripsi3');
            $table->string('icon3'); // ✅ Tambahkan ini

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tigaprogram');
    }
};
