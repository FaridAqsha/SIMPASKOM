<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('id_pengguna')->required();
            $table->string('nama_pengetahuan');
            $table->string('bidang');
            $table->string('deskripsi');
            $table->integer('biaya');
            $table->string('dokumen');
            $table->string('sertifikat');
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan');
    }
};
