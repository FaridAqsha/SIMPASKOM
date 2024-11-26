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
        Schema::table('pelatihan', function (Blueprint $table) {
            // Tambahkan kolom baru
            $table->string('materi')->after('biaya');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelatihan', function (Blueprint $table) {
            $table->renameColumn('materi', 'dokumen');
        });
    }
};
