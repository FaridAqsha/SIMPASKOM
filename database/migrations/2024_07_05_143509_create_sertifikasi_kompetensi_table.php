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
        Schema::create('sertifikasi_kompetensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('id_pengguna')->required();
            $table->string('status');
            $table->string('nama_pengetahuan');
            $table->date('waktu');
            $table->string('bidang');
            $table->string('deskripsi');
            $table->integer('biaya');
            $table->string('materi');
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
        Schema::dropIfExists('sertifikasi_kompetensi');
    }
};
